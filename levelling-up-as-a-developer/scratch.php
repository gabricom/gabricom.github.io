<?php

interface Cart{
    public function getItems();
    public function addItem($item);
    public function removeItem($item);
    public function calculateTotal();
    public function processPayment($account,$amount);
}

interface ProductCollection{
    public function getItems();
    public function addItem(Product $item);
    public function removeItem(Product $item);
}

//BAD
public function calculate(array $array){
    $t=0;
    foreach($array as $r){
        $t+=$r->getPrice()*$r->getQuantity();
    }
    return $t;
}

//GOOD
public function calculateProductsTotal(ProductCollection $products){
    $total = 0;
    foreach($products as $product){
        $total += $product->getPrice() * $product->getQuantity();
    }
    return $total;
}

class Collection{

}

class ArrayCollection extends Collection{
    //collection of Array
}

public function something(){
    $userCollection = []; //That's not a collection! Better call that $userGroups or $userArray
}


class ProductInfo{
    //[...]
}

class ProductData{ //you have made the names different without making them mean anything different

    //[...]
}

//BAD
public function copyFileInDirectory($path,$path){

}

//GOOD
public function copyFileInDirectory(string $sourceFilePath,string $destinationDirectoryPath){

}



class Address{

    private $name;
    private $lastName;
    private $street;
    private $postalCode;
    // enough context
}

public function generateReceipt(){
    // [...]

    $name = "something"; //Is that the name of what? better write $addressName;
}

class Product{
    public function addDiscountCode($code){
        // ...enough context
    }
}

//prefix needed
public function addProductDiscountCode(Product $product, string $code){

}

Class VehiclesImportCommand{

    //[...]

    public function importVehicles(){
        try{
            $xmlData = $this->getXmlObject();
            foreach($xmlData as $vehicleXmlNode){
                try {
                    $this->currentVehicle = new Vehicle();
                    $this->currentNode = $vehicleXmlNode;
                    $this->parseCurrentNodeData();
                    $this->persistCurrentVehicle();
                    $this->confirmCurrentVehicleImport();

                    //[...] Other stuff

                } catch (\Exception $exception) {
                    $this->handleVehicleError($exception);
                }
            }
        }
        catch (\Exception $e) {
            $this->addCriticalError($e);
        }
    }
}

Class ProductHelper(){
    //Generic Name , probably doing a lot of stuff who need to be splitted in subclasses
}

public function GetXmlDataParseNodeCheckIfNotPresentAndPersistVehicleToDatabase(){
    //That's probably wrong
}



public function isOrderFormValid(OrderForm $orderForm){
    $this->checkRequiredData($orderForm);
    $this->checkIfUserExist($orderForm->getUser());
    $this->checkSecurityProtection($orderForm);

    if($orderForm->getValues()->getTotal() < 100){   //this is a lower level of abstraction
       $this->doSomething();
    }

}
class Employee
{
    public function calculatePay():Money
    switch ($this->type) {
        case "COMMISSIONED":
            return calculateCommissionedPay(e);
        case "HOURLY":
            return calculateHourlyPay(e);
        case "SALARIED":
            return calculateSalariedPay(e);
        default:
            throw new InvalidEmployeeType(e.type);
    }
}

}

Class MonthlyExpenseCalculator(){

    public function outputResults(){
    print_r($this->results);
    $this->setCompletionTime(new DateTime()); // this is a sideEffect
    }

}

public function isCurrentUserActive(){
   $currentUser = $this->securityHandler->getCurrentUser();
   if($currentUser->isActive()){
       return true;
   }
   $this->UserManager->delete($currentUser); // that's another
    return false;
}

class UserAuthenticationService{

    public function login(string $username, string $password){
        $user = $this->getUser($username);
        if($this->passwordEncoder->isPasswordValid($user->getHashPassword())){
            $this->createAuthenticatedSession();
            return $user;
        }
    }

}

if (deletePage($page) == E_OK) {
    if ($registry->deleteReference($page->getName()) == E_OK) {
        if ($configKeys->deleteKey($page->getKey()) == E_OK){
            $logger->log("page deleted");
        } else {
            $logger->log("configKey not deleted");
        }
    } else {
        $logger->log("deleteReference from registry failed");
    }
} else {
    $logger->log("delete failed");
    return E_ERROR;
}


public function calculateMonthlyProfit(){
    $orders = $this->orderRetriever->getCompletedOrders();
}

public function getCurrentArticleSummary(){
    $currentArticle = $this->getCurrentArticle();
    $
}


public function getUsersForRender(){
    $users = $this->userRepository->getUsers();
    return $this->parseUserCollection($users);
}

private function parseUserCollection(ArrayCollection $users){
    $parsedUsers = [];
    foreach($users as $user){
        $parsedUsers[] = $this->parseUser($user);
    }
    return $parsedUsers;
}

private function parseUser(User $user){
    //and so on..
}

interface UserRepository
{
    /**
     * @param string $username
     * @throws UserNotFound
     * @return User
     */
    public function get(string $username): User;
}

final class DbUserRepository implements UserRepository
{
    public function get(string $username): User
    {
        $userRecord = $this->db->fetchAssoc('SELECT * FROM users W');
         if (false === $userRecord) {
            throw new UserNotFound();
         }
        return User::fromArray($userRecord);
    }
}

try {
    $user = $userRepository->get($username);
    if ($user->isSubscribedTo($notification)) {
        $notifier->notify($user, $notification);
    }
} catch (UserNotFound $ex) {
    $this->logger->notice('User was not found', ['username' => $u ];
}

class UnknownUser extends User
{
    public function username(): string
    {
        return 'unknown';
    }
    public function isSubscribedTo(Notification $notification): b
    {
        return false;
    }
}

final class DbUserRepository implements UserRepository
{
    public function get(string $username): User
    {
         $userRecord = $this->db->fetchAssoc('SELECT * FROM users W ');
         if (false === $userRecord) {
         return new UnknownUser();
         }
        return User::fromArray($userRecord);
    }
}

//special case factory
class User
{
    public static function unknown(): User
    {
        static $unknownUser = null;
        if (null === $unknownUser) {
            $unknownUser = new UnknownUser();
        }
        return $unknownUser;
    }
}

//Special case object as private nested class
class User
{
    public static function unknown(): User
    {
        static $unknownUser = null;
        if (null === $unknownUser) {
            $unknownUser = new class extends User {
                public function username(): string
                {
                    return 'unknown';
                }
                public function isSubscribedTo(Notification $noti
                {
                    return false;
                }
            };
        }
        return $unknownUser;
    }
}

class Order
{
    public function __construct(
        Product $product,
        Customer $customer,
        ?Discount $discount
    ) {
        $this->product = $product;
        $this->customer = $customer;
        $this->discount = $discount;
    }

    public function total(): float{
        $price = $this->product->getPrice();

        if (null !== $this->discount){
            $price = $this->discount->apply($price);
        }

        return $price;
    }

}

final class PremiumDiscount implements Discount
{
    public function apply(float $productPrice): float
    {
        return $productPrice * 0.5;
    }
}


public function addProductToWishlist($product,$user,$wishlistG){
    //stuff
}

public function addProductToWishlist(Product $product, User $user, Wishlist $wishlist): void
{

}

