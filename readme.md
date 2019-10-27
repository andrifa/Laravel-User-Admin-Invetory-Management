## ARCHITECTURE & SPECIFICATION
### 1. Use Laravel 5.4
### 2. Multi Guard for login Admin and User
### 3. Use MySQL
### 4. Use gmail smtp
### 5. Use AdminLTE Theme
### 6. Use Yajra Datatables Package

## FEATURES

### ->> DEFAULT HOMEPAGE : http://localhost:8000/

## USER
### ->> USER LOGIN PAGE : http://localhost:8000/login
### ->> USER REGISTRATION PAGE : http://localhost:8000/register

## ADMIN
### ->> ADMIN LOGIN PAGE : http://localhost:8000/admin/login
#### I didn't provide button to admin login page so you can directly type in the address bar

### ->> ADMIN REGISTRATION PAGE : -
#### Since he's admin, to register you can directly put to the database with using command $admin = new App\Admin, $admin->name = ..., $admin->email = ..., $admin->password = Hash::make("..."), $admin->job_title = ..., $admin->save()

##-----------------------------------------------------------------------------
##USER CREATE, EDIT, DELETE INVENTORY (AFTER LOGIN)

### ->> USER DASHBOARD PAGE : http://localhost:8000/inventory
#### in user dashboard you can look for inventory of your data only (you cannot look for others data), and in action column if you just submit request, the column will show "Waiting for confirmation", if approved by Admin will show Buttons (Edit & Delete), if rejected by Admin will show "Your Item Rejected"

### ->> USER CREATE INVENTORY PAGE : http://localhost:8000/inventory/create
#### you need to fill the request and after submit the request the system will send email to admin (by gmail smtp) and you will be redirected to dashboard and your action status will show "Waiting for confirmation"

### ->> USER EDIT INVENTORY : http://localhost:8000/inventory/4/edit
#### after edit will be redirected to dashboard

### ->> USER DELETE INVENTORY : -
#### the button will automatically delete your inventory

##----------------------------------------------------------------------------
##ADMIN DISABLE, RESET PASSWORD, DELETE USER (AFTER LOGIN)

### ->> ADMIN DASHBOARD PAGE : http://localhost:8000/admin
#### in this page you can look for All User List and there is button in column action for disable, reset password, and delete user

### ->> ADMIN DISABLE USER : -
#### if you disable user the user authority will be disabled and if user login they will be directed only to page which show text "Your Account is Suspended" and if you disable user the disable button in your action column will become "activate user" which works opposite of the disable button

### ->> ADMIN RESET PASSWORD : -
#### if you reset user password their password will become "password"

### ->> ADMIN DELETE USER : -
#### you will delete the user by click the button

##---------------------------------------------------------------------------
##ADMIN APPROVE, REJECT INVENTORY (AFTER LOGIN)

### ->> ADMIN USER INVENTORY LIST PAGE : http://localhost:8000/admin/inventory
#### in this page you can look for all user inventory list and there is button in column action for approve and reject user's Inventory, in user's inventory table the column action still show "waiting for confirmation"

### ->> ADMIN APPROVE INVENTORY : -
#### after you approve the inventory, the button in action column will be replaced by text "approved" and the button edit & delete in user action column will be shown

### ->> ADMIN REJECT INVENTORY : -
#### after you approve the inventory, the button in action column will be replaced by text "approved" and in user's inventory table the column action will be shown "your item is rejected"





