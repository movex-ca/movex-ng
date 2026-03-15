MOVEX BATCH 01 - IDENTITY FOUNDATION

This batch contains:
1. SQL schema and seed file:
   /database/batch_01_identity.sql

2. db_tester mini PHP backend endpoints:
   /db_tester/config.php
   /db_tester/helpers.php
   /db_tester/users_list.php
   /db_tester/user_create.php
   /db_tester/roles_and_maps.php

SETUP
1. Create a MySQL database, e.g. movex_9ja
2. Import /database/batch_01_identity.sql
3. Update /db_tester/config.php with your live or local DB credentials
4. Upload the folder under your live test path, for example:
   movex-org.com/9ja/movex_batch_01/
   or move only db_tester into your preferred test path

TEST URL EXAMPLES
- users list:
  /9ja/movex_batch_01/db_tester/users_list.php

- roles and role maps:
  /9ja/movex_batch_01/db_tester/roles_and_maps.php

- create user test:
  /9ja/movex_batch_01/db_tester/user_create.php?first_name=Test&last_name=User&email=testuser1@example.com&phone_e164=%2B2348099999999&state_name=Lagos&city_name=Ikeja&role_name=user

NOTES
- These endpoints intentionally have NO authorization because they are only for DB/BE testing.
- Do not keep db_tester public on production after testing.
- This batch follows the Movex rule:
  do not break existing working tables; extend with new tables in later batches.
