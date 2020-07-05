# Pickup Points Management System
 
 ## Installation
Go to the **app/code/** folder of your **M2 project** and clone this repo.
 
 `git clone git@github.com:pablobae/f101_m2.git`
 
 
 Install the module executing the following instructions : 
  
 ```
php bin/magento module:status
php bin/magento module:enable Pablobaenas_PickupSystem
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
php bin/magento cache:clean
php bin/magento cache:flush
```
 
 ## Pickup Point Management
 Login in the Admin, and click menu **Pickup System** > **Manage Pickups**
 
 ## ACL Role Resources
 Enable or disable access to the **Pickup System** depending on the type of admin user. Two role resources created:
 **Pickup System** and **Manage Pickup**.
 
 
 ## Pickup Points frontend list & customization
 To view a public list of the active pickup points visit the following address in your web browser
 
`https://YOURM2DOMAIN.com/pickuppoints/`

You can modify the upper text of the list from the administration area. Login in the Admin, and click **Content** > **Elements | Blocks**.
Look for **Pickup Points Header** block, and edit its content as you wish. Save the changes and refresh de cache.



 
  
