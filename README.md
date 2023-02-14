# FluxBucket — Challenge

This is a simple application that takes orders from listed products. It is built with Laravel, Vue 3 & Inertia. 

## 🚧 Prerequisites

Given this project requires only a default Laravel install, I have opted out of using Laravel Sail _(Docker)_ in favor of a more lightweight "setup" approach. This means you'll need to have the following installed on your machine:

- Any PHP 8 version _(e.g. 8.2.2)_
- Composer 2 _(e.g. 2.5.3)_
- Node 16 or 18 _(project is nvm ready)_

## 🚀 Get Started

To get started, you'll need to clone this repository and run the commands below:

```bash
# Step 1: Run the setup script
#
# The setup command is a custom script that...
#
#   1. installs Laravel dependencies
#   2. copies the .env.example to .env
#   3. generates your local encryption key
#   4. creates the SQLite database file
#   5. runs the migrations
#   6. seeds the database with some dummy data
#   7. installs the "frontend dependencies"
#
# 
#
npm run setup

# Step 2: Serve the application
#
# Use the "artisan serve" command to 
# serve the app on port 8000.
#
php artisan serve --port 8000

# Optional: Install the frontend dependencies
#
# You may skip this step unless you prefer using `pnpm` 
# or `yarn`. _(I personally prefer pnpm the most 🙂)_
#
npm install

# Step 3: Run the frontend development server
#
# The frontend is built with Vue 3 & Inertia. 
# To run the development server, run the
# command below:
# 
npm run dev

nvm use 18 # you may use nvm to manage your Node version
```

### Login Credentials

Here are the 2 users available for login

```
Username: test@example.com
Password: password

Username: test@example2.com
Password: password
```

### Demo

Here's a quick demo of the application in action.

![Application Demo](https://user-images.githubusercontent.com/33320494/218632580-6bde8ac5-8a57-488c-af7f-36c606b05d13.gif)

### ER Diagram

Below is this code challenge's Entity Relationship diagram.

![Entity Relationship diagram](https://user-images.githubusercontent.com/33320494/218578651-eb3a8320-5e15-49f3-95e9-0b41f491e446.png)

## 📖 Testing 

You can run the test suite by running the command below:

```bash
php artisan test
```

The output will look similar to this:

![testing](https://user-images.githubusercontent.com/33320494/218633137-b246222d-a2ed-4418-a111-16674f473381.gif)
