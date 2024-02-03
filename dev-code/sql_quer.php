<?php
// =====================================================  DDL ======================================================
// create new table from select some column other table
CREATE TABLE `condidate_certification` SELECT condidate_id, customer_id, certification FROM `condidate_details`;

// drop column from tables
ALTER TABLE `condidate_details` 
DROP certification, 
DROP itskills_version, 
DROP itskills_lastuse, 
DROP itskills_year, 
DROP itskills_month;

// add column
ALTER TABLE `condidate_project` ADD `insert_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `project_details`;

//change datatype size
ALTER TABLE employee
MODIFY COLUMN address varchar(400),
MODIFY COLUMN designation varchar(200)
;

?>