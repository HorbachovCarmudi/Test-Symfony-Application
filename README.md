# Symfony Coding Challange 
### Installation

* clone this repo to $your_directory
* docker compose
```sh
cd $your_directory &&
docker-compose up
```
* check that images are running and get docker webserver id with 
```sh
docker ps -a
```
* run
```sh
docker exec -it $your_docker_webserver_image_id sh init.sh
```

**Hint:** *probably you will need to make port 80 free with: sudo lsof -t -i:80*

### Testing
* localhost - here is main form
* localhost/admin - here is secured area (lengoo, lengoo)
* localhost/test/index.html - test results. Tests were executed in init.sh
* localhost:3306 - db is here (root, password)
___
___

### Todo:

1. Clone this repo.
2. Create a new dev branch.
3. Use many commits so we can see your progress.
4. After finishing your work, create a Pull Request from the master
5. Be ready to answer questions

### Requirements:
* Write PHP 7 valid code
* Use Symfony 3.x
* Write Unit tests where applicable/necessary
* Write your code in English

### Optional:
* Comment your code if necessary

### Your Task:
Build a simple application form. 

#### Front page:
On the front page applicants can insert their name, email address and attach a document.

On submit an email is sent to the applicant with something like "Thanks for your application! we will get back to you as fast as we can.".

Everything is saved in an MySql Database.

#### Admin page
This is a secured area. After logging in (user: lengoo, password: lengoo) we see a List with all applications. By clicking on one you can see the details from the form, the creation time and you download the attachment. And there is a Logout.

#### Bonus points:
* Clean code
* Usage of migration files
* Save the location of the applicant. Don't ask them for it. Try to get it from the request object. Maybe use a suitable library.

### Evaluation criteria:
This is what we look at - among other things:
* The program needs to run. Please provide **short** setup instructions.
* Security
* Testing
* Usage of Composer
* All code in UTF-8

We are not searching for the best frontend design. Focus on code.
