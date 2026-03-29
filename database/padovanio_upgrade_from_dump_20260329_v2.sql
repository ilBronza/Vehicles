-- =============================================================================
-- DB come in padovanio (1).sql (Mar 29, 2026) → schema migration consolidata
-- IlBronza Vehicles — 2023_07_31_170238_create_vehicles_table
--
-- Dal dump risultano già presenti: cost_per_movimentation, vehicle_models,
-- vehicle_model_id / current_km su vehicles, FK su types e vehicle_models,
-- user_id → users su km_reading.
--
-- Manca rispetto alla migration: FOREIGN KEY su vehicles__km_reading.vehicle_id
--
-- Prima: backup. Verifica che ogni vehicle_id in km_reading esista in
-- vehicles__vehicles (o imposta NULL gli orfani).
-- =============================================================================

SET NAMES utf8mb4;

-- Opzionale: come string() Laravel sulla tabella types (nel dump è varchar(64))
ALTER TABLE `vehicles__types`
	MODIFY COLUMN `vehicle_type` VARCHAR(255) NULL DEFAULT NULL;

-- Unico obbligo “nuovo” rispetto al dump (1)
ALTER TABLE `vehicles__km_reading`
	ADD CONSTRAINT `vehicles__km_reading_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles__vehicles` (`id`);

-- Se compare errore duplicato sul constraint, il vincolo c’è già: salta la riga sopra.
-- Se compare errore su righe orfane, correggere i dati prima di rilanciare.
