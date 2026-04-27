# XiphiasRestaurantApp
PHP web app meant to mimick a restaurant reservation system


• Brief project description
This is a PHP web app meant to mimick a restaurant's reservation page, as well as the restaurant's admin dashboard which has an overview of all reservations made

• Prerequisites
Docker version 4.70.0
Ability to run docker compose

• Step-by-step instructions to run the application
Download or clone the project repository
Open Powershell or simmilar terminal and go to project's root
Run 'docker-compose up (or docker-compose up --build on first run)
Please wait while the images install
The web app is now available via browser on http://localhost/



• How to access the public page and admin dashboard
Due to the fact that this task did not require authentication both can easilly be acess from their respective buttons on the homepage
You can also access the reservation form via http://localhost/reserve, as well as the admin portion of the code via http://localhost/admin

• Any assumptions or decisions you made and why
Due to it being previously mentioned that the kitchen closes at 21 and the restaurant as a whole at 22 when setting limits for private dining events I gave them the same last reservatiuon slot at 21 as I belived that the same reason why regular reservations are cut off at 21 is valid for private dining as well. To put it into more lamens terms I understood it as you are free to mingle until closing time if your timeslot allows it, but you cannot enter at or near to closing time

• If something doesn't work perfectly, say so. We'd rather know about it than discover it ourselves.
I have not fulliflled everything given in this task most of which are:
When booking reservations there is no checking for public or prvate dining if the timeslot is full.
When making reference codes there is no logic which checks for uniqness, simply random generation
While the dropdown menu is there I did not get the chance to implement reservation status editing logic
Finally, there are no tests

This was my first runin with Symphony and everything that entails so even what I did of the task took quite a bit longer than 8 hours.
I thank you for the oportunity given
