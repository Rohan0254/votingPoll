<p align="center">Voting Poll App</p>

## Setup instructions

1. Use Below Command To Clone Repo.
- git clone https://github.com/Rohan0254/votingPoll.git

2. Now go to project directory
- cd votingPoll

Run these commands in CMD in project root.

1. Configure Database
- Create Database named 'votingpole'

2. Configure .env file
- Rename .env.example file to .env

3. Now To Migrate Table use below command
- php artisan migrate


4. Run App
- php artisan key:generate
- php artisan serve

5. App Navigations
- Login
- Register
- Profile
- Dashboard
	- Create Poll
	- View Poll
	- Participate in polls
	- My Profile
	- Voting History
	- Activity History
- Voting History
- Activity History
- Logout

## Test Cases

To run test cases use below command
- php artisan test

Test cases written for
- Login
- Register
- Create Poll
- Activity History
- View Poll
- Profile
- Logout


<h2  align="center">Thanks.</h2>
