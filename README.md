## Wally Fantastic Adventures 

## Scenario 
● 250 widgets
● 500 widgets
● 1,000 widgets
● 2,000 widgets
● 5,000 widgets

1. Only whole packs can be sent. Packs cannot be broken open.
2. Within the constraints of Rule 1 above, send out no more widgets than necessary to fulfil
the order.
3. Within the constraints of Rules 1 & 2 above, send out as few packs as possible to fulfil each
order.

##Method
First i started with highest package size and see how much order u can cover with biggest size which covers rules 1. and 2.

x is the package amount ie 5000 * 1 one package / n user input or what is leftover / y is group size
method to get and formula  
```$x = $y / $n;```

```$n - (($x - 1) * $y);``` 


Once we found results of this we need to optimize further with 3rd rule which is fulling each ofer with fewest amount of packs within rules.

``` if $y * $x > next iternation $y * x-1 ``` where we shift amount of packet amount to next iternation
	
##SetUP
I have't done much to set this up since there is no DB connection all i done is run 
1. ```git clone git@github.com:kenshikento/willy-app.git```      [to get files]
2. ```composer install```
3. ```cp .env.example .env```         [to copy the example env] 
4. ```php artisan key:generate```  [to generate the key]
5. ``` npm install``` then ``` npm run dev```   [this needs to be done to get vite server up]
6. ``` php artisan serve```  [just too run quick local host]


##Testing
Too run the test just run ``` php artisan test``` and is located in unit test since there isn't really any component based testing needed here.
Also if you are running test make sure you have vite running or it wont find files.

##General 
Ideally for the groups information would come from Database or potentially Enum which either would output as Collection so for this exercise i just made it output as collection as a property but for real scenario it would be most likly a DB.

Frontend is very simple just form just to link to home controller and finally service.

##Bugs
1. At the moment there is issue with compiling with vite its not auto refreshing on change.
2. There are some edge cases that are not delt with in this code. 

##Improvements which i would do if i had more time
1. In service i would change way i depend on properties of service file as it restricts multiple calls within same class so you can't really batch call with this method.
2. Better to have the group conditions in DB or at least Enumeration.
3. Have more unit testing on this not just on expectated output of algorithm.
