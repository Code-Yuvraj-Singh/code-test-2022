# X. My Thoughts on the codebase
The very first thing I noticed when I opened the project were that the files and folder structure, there were not many files which made me think it was a small project.
    As I checked all the file names, I quickly figured out the project was using the Repository pattern. Repository pattern is not considered a great option in the modern Laravel.
    The **"BookingRepository.php"** was a HUGE php file with a lot going on. It already violated a lot of "good" programming practices i.e. not avoiding huge classes (god classes).
	Upon skimming through the whole file and checking the functions I noticed that the class was acting on more than one entity 

# Y. My process of refactoring
The project consisted of a single controller and a single repository, as said before it is not a modern way of writing Laravel with repository pattern. To modernize it I first found the possible entities, I found out that there were two major things happening in the repository.
1. **Job related functions.**
2. **Notification related functions.**

	To refactor this code, I had to look in each function to find its related functions and to get an idea of what it was doing. I lacked the knowledge of what was going on in real project but I tried my best to understand as much as I could.
	I tried to follow SOLID principals to some extent and used both Service and Action classes. I first split up the controllers of both notifications and jobs, upon reading the code more I figured there are two types of actions happening on the **Job::class** model. I split the basic **CRUD** operations into the **JobController** which uses **JobService** and the other operations to **JobManageController** which uses **JobService**. There were more functions in the program which were being used independent of entity, for those particular functions I created the **Action** classes. I created two actions classes:
1. **JobLogger**: This is used to logging job related logs. It extends an **AbstractLogger**, you can extend this logger to create more loggers.
2. **Mailer**: Mailer follows a very similar structure to logger, you can extend from a **AbstractMailer** to make more mailer classes based on your requirements. I saw a common pattern repeat in the project that we were passing in unnecessary data over and over which made me split this.

I also found out some functions being used in many places as helpers, for those I split them into their own traits. This helped in improving code reusability even more which was my main goal.

# Final Thoughts
Although I do not completely understand the project as a lot of stuff is missing and don’t know how the internals are working; I tried my best to refactor it into what I consider a cleaner and scalable code. I think we should not have a single class/function with a lot of responsibility instead, we should split them into multiple smaller units that can work independently from one another, this significantly increases flexibility of out codebase. 

Thank you for your time!
