### Getting started
1. `git clone`
2. `composer install` in the main folder.
3. `cd /src/devlabs/UserBundle composer install`
4. Edit `/app/config/parameters.yml` to set up your database settings.
5. `php bin/console doctrine:database:create`
6. `php bin/console doctrine:schema:update --force`
7. Copy the template for PhpUnit in the repository root folder `cp phpunit.xml.dist phpunit.xml`
8. Add a test suite entry under the `<testsuites>` tag in `phpunit.xml`:
`
        <testsuite name="Project Test Suite">
			<directory>./src/devlabs/UserBundle/Tests</directory>
        </testsuite>
`
9. You can now run the project tests with `/vendor/phpunit/phpunit`.
Optionally, you can symlink phpunit to the root folder with:
`ln -s /vendor/phpunit/phpunit/ .` on Unix-like systems, and `mklink phpunit /vendor/phpunit/phpunit` on Windows.


### Regarding the without-classes branch
The main difference from the `main` branch is that the AddressServiceTest mocks the `EntityManager` and `AddressRepository` classes. You can see this in action in the `src/devlabs/UserBundle/Tests/Service/AddressServiceTest.php` file. The functions to create the mock objects are `getEntityManagerMock` and `getAddressRepositoryMock`. I have left out the original code from the `master` branch so you can compare the differences more easily.

The point of mocking in this manner is that it allows you to mock classes you don't have access to. There are a few things to keep in mind when doing this, however:

1. You must pass the methods which you plan to call on the mock object

By default, the `$this->getMockBuilder('ClassName')` will create an faux php class with no methods in it. If you try to call a method on the (empty) mock, you will get an exception. The proper way to do this is to call `setMethods` on the mock you get from `getMockBuilder`. You can see an example of this in the `src/devlabs/UserBundle/Tests/Service/AddressServiceTest.php/` file or the [PHPUnit documentation](https://phpunit.de/manual/current/en/test-doubles.html#test-doubles.mock-objects.examples.SubjectTest.php)

2. You must mock all functions you call on the mock object

When creating mocks with a class, you have the option of selectively mocking functions or calling the default implementation on the class you are mocking. With classless mocks you don't have this luxury. Every method which gets called on the mock object must be itself mocked, as there is no 'class implementation' to speak of.

Here's an example of a method mock:
`$yourMock->expects($this->once())
	->method('yourMethod')
	->will($this->returnValue('your_test_data'));`

3. Be careful with [strict type declarations](http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration) when using dependency injection

When creating a mock with an existing class, PHPUnit returns a mock which matches the type of the passed class. However, as we _cannot_ pass a non-existent classname, PHPUnit will not be able to match the type. This will have the effect of triggering a type mismatch error for all functions which take the mocked class as an argument.

There are two ways to get around this:
  - Don't use type declarations for classes you plan to mock
  - Use a parent class you _do_ have for your type declaration, and request a mock of that class when testing.

All you need to do to execute the second strategy is to call the `getMockBuilder` function with the correct class path. PHPUnit will make sure to match the type of the returned mock to the string you provide. You can see an example of how to carry out the second strategy in the `getEntityManagerMock` function in `src/devlabs/UserBundle/Tests/Service/AddressServiceTest.php`.
