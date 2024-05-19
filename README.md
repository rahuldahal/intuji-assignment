## Integrating Google Calendar API with PHP

[Video Demo](https://www.loom.com/share/e0e40b0ce74240a7afeb38758db70870?sid=3b2b8963-6c32-49cf-ad29-9af68236e722)

### Overview
In this project, I aimed to link the Google Calendar API with a PHP application to enable Create, Read, and Delete operations on users' calendars, as instructed by Intuji in the initial email. Initially, I attempted the integration without using Composer libraries, but found multiple issues, necessitating a day-long troubleshooting effort. Finally, I switched to Composer, which speeded up the process.

### Initial Attempts
At first, I attempted to integrate the Google Calendar API straight into the PHP program without using Composer modules. Despite extensive investigation and attempts, I discovered numerous mistakes, ranging from namespace issues to dependency conflicts. These challenges proved time-consuming and eventually resulted in a dead end.

### Transition to Composer
Realizing the complexities and limitations of the manual integration approach, I switched to Composer for managing dependencies. This decision facilitated seamless integration of the Google API Client library (`google/apiclient: 2.16`) and other essential packages such as `vlucas/phpdotenv` for handling environment variables.

### Libraries Used
- **google/apiclient: 2.16**: Google's official API client library for PHP, crucial for interacting with the Google Calendar API.
- **vlucas/phpdotenv: 5.6**: Used to manage environment variables stored in a `.env` file, enhancing security and configurability.
- **Bootstrap: ^5**: Used for frontend UI styling, ensuring a visually appealing and user-friendly interface.

### Conclusion
Despite encountering initial setbacks, transitioning to Composer enabled a more efficient and effective integration process. By leveraging Composer's dependency management capabilities and incorporating essential libraries, I successfully implemented CR(U)D operations on users' Google calendars within the PHP application.