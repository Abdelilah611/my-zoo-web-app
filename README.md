# Arcadia Zoo

Arcadia Zoo - Application web pour la gestion d'un zoo (entreprise fictive)

# Deploy Localy

After cloning the repository you'll have to run :

- composer install
- Start docker on your Machine
- make start (to start symfony server, docker database and mailer)
- make sf-dmm
- make sf-fixtures (to write the existing fixtures)
- ./bin/tailwindcss -i assets/styles/app.css -o assets/styles/app.tailwind.css -w (if you need to modify the Tailwind CSS classes and follow changes)

Next you'll have to create an admin User
To do so type :

- console app:create-admin <email> <password> <First Name> <Last Name> (it should looks like : console app:create-admin admin@example.com password123 John Doe)
  Then you'll be able to use this account in the /login route to Log you in and manage the Zoo.

You'll have to create Users :

- Go to admin panel (/admin)
- Invitations -> Create
- write the email and validate
- Come back to invitations copy the uuid given and go to /invitations/[uuid]
- Write down the informations and chose your password
- After go to Utilisateurs
- Edit your user to give him ROLE_EMPLOYEE or ROLE_VETERINARY
  And that's it, you've created a working User.
