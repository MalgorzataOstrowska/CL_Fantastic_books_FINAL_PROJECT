# CL_Fantastic_books_FINAL_PROJECT

#####[GitHub](https://github.com/MalgorzataOstrowska)
#####[LinkedIn](https://www.linkedin.com/in/ma%C5%82gorzata-ostrowska-09217213a/)

###Description:
* PHP, Symfony2, MySQL
* The database of books.  
* Searching for a book by features of book characters.

###Role hierarchy:

* ROLE_EDITOR: ROLE_USER  
* ROLE_ADMIN: ROLE_EDITOR  
* ROLE_SUPER_ADMIN: ROLE_ADMIN
    
###Access control:
* path: ^/login$, role: IS_AUTHENTICATED_ANONYMOUSLY  
* path: ^/register, role: IS_AUTHENTICATED_ANONYMOUSLY  
* path: ^/resetting, role: IS_AUTHENTICATED_ANONYMOUSLY  
* path: ^/user/, role: ROLE_USER  
* path: ^/editor/, role: ROLE_EDITOR  
* path: ^/admin/, role: ROLE_ADMIN  
        
###Used bundles:

* FOSUserBundle – to register and login 
* DoctrineExtensionsBundle – to use REGEXP in SELECT
* KnpPaginatorBundle – to use pagination 