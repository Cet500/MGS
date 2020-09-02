
**games**

- id
- name
- description
- date_relize
- id_company_creator
- id_company_publisher
- is_tablet


**companies_create**

- id
- name
- description
- year_create


**companies_publish**

- id
- name
- description
- year_create

**genres**

- id
- genre


**langs**

- id
- lang


**game_text_lang**

- id
- id_game
- id_lang


**game_voice_lang**

- id
- id_game
- id_lang


**game_subtitles_lang**

- id
- id_game
- id_subtitles

**game_genres**

- id
- id_game
- id_genre


**system_requare**

- id
- id_game
- os
- cpu
- ram
- memory
- videocard
- directx
- soundsys


**tags**

- id
- tag
- description


**game_tags**

- id
- id_game
- id_tags


**comments**

- id
- id_game
- id_user
- datatime_write
- name_comment
- text_comment
- likes
- dislikes
- is_positive

**users**

- id
- name
- lastname
- login
- pass_hash
- avatar
- datatime_reg
- datatime_last_login
