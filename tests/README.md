<p align="center">
  <a href="https://github.com/othneildrew/Best-README-Template">
    <img src="../images/logo.png" alt="Logo" width="80" height="80">
  </a>

  <h3 align="center">README for information on the project</h3>  
</p>

<!-- TABLE OF CONTENTS -->
<details open="open">
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#tests">Tests</a>
      <ul>
        <li><a href="#feature-tests">Feature</a></li>
      </ul>
      <ul>
        <li><a href="#test-case">Testcase</a></li>
      </ul>
    </li>    
    <li><a href="#usage">Usage</a></li>    
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## Tests

This project aims to evaluate the effectiveness of Test-Driven Development when creating applications. A REST API was built within laravel using TDD that can handle CRUD operations. There are also simple CRUD controllers and views that were also built using TDD.

### Feature Tests

APITest => Tests various aspects of the API functions. Mainly CRUD operations acting as a user with the correct privileges.

AuthController => Tests that a bearer token is successfully generated and returned in the Json response from the API upon registering or login.

FrontEndTests => Used to make sure the correct views are returned upon certain vistits to URLs.

SeederTest => Makes sure seeding works correctly.

StudentManagementTest => Tests all the CRUD operations for students.

TeacherManagementTest => Tests all the CRUD operations for teachers.

### Test Case

TestCase => Create function when passed with model parameter is used to create a DB entry based on the model that is passed. Uses resource.

<!-- USAGE EXAMPLES -->
## Usage

These tests are vital to creating the application with TDD. I started from scratch with each test failing and then wrote the minimum amount of code to make them pass. I have been refactoring throughout the process. 


