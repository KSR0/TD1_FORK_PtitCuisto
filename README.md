# P'TIT CUISTO

PtitCuistot is a html/css/php/javascript web application.<br>
It's a recipe blog containing various cooking recipes.

## How to visualize it ?

- **Visiting https://dev-bayon222.users.info.unicaen.fr/TD1_FORK_PtitCuisto and connecting with your university credentials.**
### OR
- **Using `git clone` :**
  - Create a folder on your computer to store the files of the project.
  - Enter in the created folder, right click and click on `Git Bash Here`.
  - Clone the project using the `git clone` command and the link of the project (https://github.com/KSR0/TD1_FORK_PtitCuisto.git).
  - Use Xampp / Lamp / Wamp to host it in local.
  - Create a MySQL database, copy and paste the SQL code available in [edito_script.sql](https://github.com/KSR0/TD1_FORK_PtitCuisto/blob/main/MCD-MLD-SCRIPT_SQL/Script_SQL_PtitCuisto.sql).
  - Fill in the blanks of the [all_secret_variables.env](https://github.com/KSR0/TD1_FORK_PtitCuisto/blob/main/all_secret_variables.env).
  - Open the [index.php](https://github.com/KSR0/TD1_FORK_PtitCuisto/blob/main/index.php) files in your web browser.



## Main features (V1)

The user can:

- Consult the "Edito" page,
- Consult the "Recipes" page,
- Consult the details page of a recipe,
- Filter recipes by category, title (containing words), or by ingredient(s).

The editor can:

- Perform the same operations as the internet user,
- Add a recipe (subject to administrator validation),
- Modify a recipe owned by them (subject to administrator validation),
- Delete a recipe owned by them.

The administrator can:

- Perform the same operations as the internet user and the editor,
- Add, modify, or delete any recipe,
- Validate the addition or modification of a recipe,
- Modify the content of the editorial page.

### More Features (V2)

New features have been integrated into the site:

- The ability for the internet user to create an account,
- The ability for the editor to change their password,
- The ability for the editor to delete their account,
- The ability for the editor to enter a comment on a recipe (subject to administrator validation): comments will be displayed on the details page of a recipe.
- The ability for the administrator to suspend or delete an account.

## Database Diagrams
### MCD
![MCD_CORRECT](https://github.com/KSR0/TD1_FORK_PtitCuisto/assets/119522087/78a1ec2c-c91b-4e4f-937d-f3af4f866bc9)

### MLD
![MLD_CORRECT](https://github.com/KSR0/TD1_FORK_PtitCuisto/assets/119522087/24e1cc6b-bb56-4cc3-87a7-6380255374a9)


## Website credentials

1. Admin :<br>
</t> - Email : admin.fork@gmail.com<br>
</t> - Password : FORKFORLIFE<br>

2. Editor :<br>
</t> - Email : editor.cooking@gmail.com<br>
</t> - Password : COOKINGFORLIFE

## Made using

- [Tailwind](https://tailwindcss.com/) - CSS framework.
- [MySQL](https://www.mysql.com/fr/) - DBMS.
- [GitHub](https://github.com/) - Code hosting platform for version control and collaboration.

## Authors
Project developed by :
- [Nicolas Peyregne (KSR0)](https://github.com/KSR0)
- [Axel Bayon (axelbayon)](https://github.com/axelbayon)
- [Leny Meziere (AtlasV4)](https://github.com/AtlasV4)
