var express = require('express');
var router 	= express.Router(); 
var auth 	= require('./auth.js');
var items 	= require('./items.js');
 
/*
* Routes that can be accessed by any one
*/
//router.post('/login', auth.login);
 
/*
* Routes that can be accessed only by autheticated users
*/
//router.post('/api/v1/items', items.getAll);
router.post('/', items.getAll);

module.exports = router;