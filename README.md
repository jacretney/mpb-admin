## About Substratum
Substratum is an admin panel for the official Minecraft Bedrock Server Software.

The goal is to have an admin panel accessible at a web address which talks to the Minecraft Server, allowing you to manage the server without having to SSH in and edit config files.

When it's done, you'll be able to:
- Update and manage the `server.properties` file
- Create and manage various worlds
- Issue commands to the server, eg `start`, `stop`, `logs` etc
- Configure commands on a schedule

### Development
This project uses Laravel, and Laravel Sail as the development environment.

Run `composer install` in the repository root to get things started, ensuring you are running PHP 8.1.

Then, `./vendor/bin/sail up -d` should start the environment. If you're using WSL 2, you should be able to see the project at 'http://localhost'.

### Deployment - WIP
This project comes with an Ansible playbook which can be used to deploy the project to a server. The project can also deploy the Minecraft Bedrock Server Software too if needed.

Further docs TBD.

### What's with the name?
It's a synonym of Bedrock, and it sounds cool.