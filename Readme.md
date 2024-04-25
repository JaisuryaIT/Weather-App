**Weather App: Get Real-Time Weather Updates**

This readme file provides a comprehensive guide to setting up and running your weather application. With this app, you'll have access to real-time weather information at your fingertips.

**Prerequisites**

- [Git]([https://git-scm.com/](https://git-scm.com/))
- [Composer]([https://getcomposer.org/](https://getcomposer.org/))
- [PHP]([https://www.php.net/](https://www.php.net/))

**Installation**

1. **Clone the Repository:**
    
    ```
    git clone https://github.com/JaisuryaIT/Weather-App.git
    ```
	
2. **Navigate to Project Directory:**
    
    ```
    cd your_project_directory
    ```
    
3. **Install Dependencies:**
    
    ```
    composer install
    ```
    
4. **Set Up Environment Configuration:**
    
    - Copy the `.env.example` file to `.env`: 
        
        ```
        cp .env.example .env
        ```
    
    - Update the following details in the `.env` file according to your database configuration:
        
        **Important:** Replace placeholders with your actual database credentials(Changing APP_NAME in .env is optional and is reflected while using the app).
        
        ![env](https://github.com/JaisuryaIT/Weather-App/assets/142618443/6666f605-9d39-40f7-b217-5eefa15fa4c2)

        
5. **Generate Application Key:**
    
    ```
    php artisan key:generate
    ```
    
6. **Migrate the Database:**
    
    ```
    php artisan migrate
    ```
    
7. **Configure Email Settings (Optional):**
    
    - If you intend to use email functionalities within the app, update the following details in the `.env` file:
        
        ```
        MAIL_USERNAME=your_email_address
        MAIL_PASSWORD=your_email_password
        MAIL_FROM_ADDRESS=your_email_address
        ```
        
	- ![env1](https://github.com/JaisuryaIT/Weather-App/assets/142618443/8102e370-f143-491c-878d-0ba1ea82cab1)

    - **Important:** Enable less secure app access in your Gmail settings for the email address you provide. Refer to the provided screenshots (maintain image placeholders) for guidance.
    - ![env2](https://github.com/JaisuryaIT/Weather-App/assets/142618443/91d9f812-bb97-4f4c-a723-2c08db824972)
   
	- ![env3](https://github.com/JaisuryaIT/Weather-App/assets/142618443/7451b0d5-5703-429d-87e0-796dc66c837b)

        
8. **Run the Application:**
    
    ```
    php artisan serve
    ```
    
**Accessing the Application**
- Open http://127.0.0.1:8000 in your web browser.
- Sign up for the first time to create database credentials.
- Log in to start using the weather app.


**See this video demo at https://drive.google.com/file/d/1yzrhMn7THB5zaAnPETCsQx0bX3bYA0hz/view?usp=drive_link**
