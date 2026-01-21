# COP4331C Small Project: Contacts App

## Dev Environment Setup 

This project is set up so that the LAMP stack is running on Docker, a containerization system. This will allow us to run the entire app on our local machines to test our work instead of working directly on the server. Docker also allows us to easily track changes and deploy them to the server to be tested. Docker can be a _little_ trickier than bare metal Linux to get the hang of but I promise it (or some variant of it) is used everywhere in the industry and will make our lives a whole easier as this project grows. 

To install Docker on Windows you can download it from [here](https://www.docker.com/products/docker-desktop/).

If it asks about a hypervisor or WSL, tell it you want to use WSL2.

Visual Studio Code has a great extension for building and running Docker containers as well as using Git. I reccomend getting that set up and using it but you can use whatever IDE you're comfortable with. 

To build and spin up the app after you have the project checked out, you can run `docker compose up` and the website will be available on http://localhost:8080

## Git Collaboration

In case anyone has never had to use Git before, [this](https://learngitbranching.js.org/) is a cool tool to understand it. Git is a beast and takes a lot to fully understand it but I (Jake) have somewhat of a grasp on it and can help if needed. 

Basically using Git in this context boils down to:

- Create a branch based on `dev` titled with your initials and what you plan to be working on. For example: `jth-passwordencryption`
    - Command to do this would be `git checkout dev`, `git pull`, `git branch jth-passwordencryption`, and `git checkout jth-passwordencryption`
- Commit to your branch as you add things/make changes. 
    - It's okay to commit things little by little. Commits allow you to go back if you make a mistake or go down a wrong path. Having plenty of commits also allows others to see how your code has been built over time and maybe understand it a little better.
- Push your branch to Github
    - It's good practice to push every few commits. This way your code is backed up in case your computer dies a firey death. 
- Create a pull request to merge into dev
    - This is where you can show off your work to everyone else. Write a little description talking about what you did and why.
    - Others are encouraged to leave comments on pull requests pointing out issues with style, naming, or bugs they might have found. 
        - Comments have a status of active, pending, and resolved. If a comment is active or pending the pull request owner will not be able to complete it
            - If a comment is left, the pull request author should mark it pending after a change has been made to address it and the comment author and mark it as resolved. 
        - I'm thinking about making the policy that each pull request needs 2 approvals from members of the team that are not the author to be merged in. This ensures that most of the team is aware of what work is going into the codebase.
        teamwork