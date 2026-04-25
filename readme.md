# Vehicles

Gestione mezzi (tipologie, modelli, veicoli, letture km) e **integrazione con il pacchetto Products**: righe ordine/preventivo tipizzate, sellable e fornitori collegati al dominio veicoli.

## Requisiti

- Laravel e pacchetto **Products** (`ilbronza/products`) installato e funzionante.
- Le migration che aggiungono colonne sugli extra field delle righe controllano `app('products')`: senza Products non creano le colonne (vedi messaggio in migration).

## Panoramica dell’integrazione

L’integrazione non è un singolo trait: è un insieme coordinato di:

| Area | Ruolo |
|------|--------|
| **Catalogo sellable** (`VehicleType`) | Target dei `Sellable`; definisce i campi prezzo esposti al sistema (`getPriceFieldsForSellable()`). |
| **Veicolo come supplier** (`Vehicle`) | Implementa l’interfaccia supplier di Products e collega i sellable possibili al tipo mezzo. |
| **Righe custom** (`VehicleOrderrow`, `VehicleQuotationrow`) | Estendono `CustomOrderrow` / `CustomQuotationrow`; tipo riga e prefisso config per fieldset e pulsanti. |
| **Container Order/Quotation** (nell’app) | Trait `UsesVehicleRowTrait`: relazione `vehicleRows`, totali/margini, campi da aggiornare in bulk edit. |
| **Config** | `config/vehicles.php` (UI righe e CRUD veicoli); nell’app, `config/products.php` (`possibleRowTypes`, field groups per `orderrow` / `quotationrow`). |
| **DB** | Colonne `stored_*` sulla tabella degli extra field delle righe ordine (allineate ai price fields del sellable). |

## Componenti principali nel pacchetto

### Trait e modelli sellable

- **`VehicleType`** (`src/Models/Sellables/VehicleType.php`): `SellableItemInterface`, `InteractsWithSellableTrait`, `getPriceFieldsForSellable()` (es. costo per km/giorno/movimentazione). Crea/aggiorna sellable su save.
- **`Vehicle`** (`src/Models/Sellables/Vehicle.php`): `SupplierInterface`, `InteractsWithSupplierTrait`, `SingleSellableSupplierTrait`; `getPossibleSellables()` usa il sellable del `VehicleType` associato.
- **`IsVehicleSellableSupplierTrait`**: merge dei cast prezzo sui campi derivati da `getPriceFieldsForSellable()` (per sellable supplier).

### Righe ordine e preventivo

- **`VehicleOrderrow`** estende `IlBronza\Products\Models\Orders\CustomOrderrow`.
- **`VehicleQuotationrow`** estende `IlBronza\Products\Models\Quotations\CustomQuotationrow`.

Entrambi impostano:

- `$typeName = 'VehicleType'` — usato da `TypedOrderrowTrait` sulla riga base (scope e valorizzazione del `type`).
- `$designedTargetConfigPackagePrefix = 'vehicles'` — risolve fieldset e pulsanti da `config('vehicles.models.orderrow|quotationrow...')`.

**`VehicleRowQuotationOrderCommonTrait`**: in `initialize*`, chiama `setCustomrowCasts()` con i campi prezzo del `VehicleType`; definisce getter di costo/ricavo riga e comportamento della quantità (es. default da km del container).

### Trait sul container Order / Quotation (applicazione host)

Il trait **`UsesVehicleRowTrait`** (`src/Models/Sellables/UsesVehicleRowTrait.php`) va usato sui modelli `Order` e `Quotation` del progetto (non è nel pacchetto Products):

- Metodo astratto `getVehicleRowRelatedModel(): string` → classe `VehicleOrderrow` o `VehicleQuotationrow`.
- Relazione **`vehicleRows()`** — il nome della relazione deve comparire in **`config('products.models.order.possibleRowTypes')`** come `'vehicleRows'` (e analogamente per quotation se configurato).
- **`initializeUsesVehicleRowTrait()`** registra i campi costo da aggiornare in modifica tabella tramite `addFieldsToUpdateByRowTypes('vehicleRows')` (vedi `CommonOrderQuotationPricesTrait` in Products).

### Altro

- **`InteractsWithVehicle`** (`src/Models/Traits/InteractsWithVehicle.php`): dominio (es. volume / sovraccarico), non è il glue orderrow/sellable.

### Service provider

`VehiclesServiceProvider` registra il **`morphMap`** per `Vehicle`, `VehicleType`, `VehicleModel` e carica config, rotte, migration, traduzioni.

### Config pacchetto

`config/vehicles.php` definisce tra l’altro:

- `models.orderrow` / `models.quotationrow`: field groups, fieldset edit, `relatedButtonsMethods` (aggiungi riga, tabella, sellable supplier).
- `models.vehicleType`, `vehicle`, `vehicleModel`, `kmreading`: CRUD, fieldset, relationship manager.
- `sellableSupplierPricesHelper` per coppie tipo-fornitore.

Pubblicazione: `php artisan vendor:publish --tag=vehicles.config`.

### Migration extra field

`database/migrations/2025_07_31_170238_add_vehicles_extrafields_to_rows_table.php` aggiunge colonne `stored_{campo}` sulla tabella del modello collegato a `Orderrow::extraFields()`, per ogni campo restituito da `getPriceFieldsForSellable()`. Mantieni allineate migration e metodo `getPriceFieldsForSellable()`.

---

## Configurazione nell’app (Products)

Nel **`config/products.php`** dell’applicazione, per il modello **order** (e coerentemente per **quotation**):

1. **`possibleRowTypes`**: includere `'vehicleRows'` affinché il container esponga la relazione omonima.
2. **`orderrow.fieldsGroupsFiles`**: voci come `vehicleOrderrow` e `relatedByType.vehicle` devono puntare ai field group corretti (spesso classi nel pacchetto Products che wrappano i parametri Vehicles).

Esempio di struttura già prevista in Products (nomi indicativi): `VehicleRowsByContainerFieldsGroupParametersFile`, `VehicleOrderrowRelatedFieldsGroupParametersFile`.

---

## Come replicare il pattern per un altro package

Per un nuovo dominio (es. attrezzature, noleggi) che deve convivere con Products allo stesso modo:

1. **Config dedicato** `config/{pacchetto}.php` con la stessa struttura di `vehicles.php` per `orderrow`, `quotationrow` e i modelli di catalogo.
2. **Modello catalogo** con `InteractsWithSellableTrait` + `getPriceFieldsForSellable(): array` (chiavi = nomi logici dei campi prezzo).
3. **Classi riga** che estendono `CustomOrderrow` e `CustomQuotationrow` con `$typeName` coerente col tipo sellable e `$designedTargetConfigPackagePrefix` uguale al nome del config.
4. **Trait sul container** con relazione dedicata (es. `equipmentRows()`), stesso identificatore in `possibleRowTypes`, e `addFieldsToUpdateByRowTypes('equipmentRows')` nell’`initialize*`.
5. **Field group e fieldset** registrati sia nel config del pacchetto sia in `products` (order/quotation e orderrow/quotationrow).
6. **Traduzioni** Products (`products::models.{relationName}`) se usi PDF/HTML preview che elencano le righe per tipo.
7. **Migration** per `stored_*` sugli extra field delle righe, iterando su `getPriceFieldsForSellable()`.
8. **`Relation::morphMap`** per tutti i modelli usati come `target` dei sellable.

---

## Riferimenti rapidi (Products)

- `IlBronza\Products\Models\Traits\Customrow\CustomrowTrait` — cast `stored_` / `calculated_`, pulsanti riga, risoluzione classe da config `products.models.customOrderrows` / `customQuotationrows`.
- `IlBronza\Products\Models\Traits\Order\CommonOrderQuotationPricesTrait` — `addFieldsToUpdateByRowTypes`, totali per tipo riga.
- `IlBronza\Products\Models\ProductPackageBaseRowModel` + `TypedOrderrowTrait` — colonna `type` sulle righe.

---

## Licenza

MIT (vedi repository).
