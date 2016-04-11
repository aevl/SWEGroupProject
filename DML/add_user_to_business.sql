INSERT INTO ‘business_has_User’ (Business_company_name, user_email) VALUES (SELECT * FROM ‘business’ WHERE company_name =  ?‘’, SELECT * FROM ‘user’ WHERE email = ?‘’) ;
