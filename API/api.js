var express = require('express');
let jwt = require('jsonwebtoken');
let config = require('./config');
var middleware = require('./middleware');

var hostname = 'localhost';
const PORT = 8001;
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "projet_web";

const multer = require('multer');
const upload = multer();

var controller = require('./userController.js');
var userController = controller.userController;
var bodyParser = require("body-parser");
var mysql = require('mysql');

var app = express();
app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

var con = mysql.createConnection({
    host: HOST,
    user: USERNAME,
    password: PASSWORD,
    database: DATABASE
});

userController.connection = con;

app.get('/token', (req, res) => userController.login(req, res));

app.get('/users', upload.none(), middleware.checkToken, (req, res) => userController.index(req, res));
app.get('/users/:id', upload.none(), middleware.checkToken, (req, res) => userController.show(req, res));
app.get('/connect', upload.none(), middleware.checkToken, (req, res) => userController.connect(req, res));
app.post('/users', upload.none(), middleware.checkToken, (req, res) => userController.store(req, res));
app.put('/users/:id', upload.none(), middleware.checkToken, (req, res) => userController.update(req, res));
app.patch('/users/:id', upload.none(), middleware.checkToken, (req, res) => userController.update(req, res));
app.delete('/users/:id', upload.none(), middleware.checkToken, (req, res) => userController.destroy(req, res));

app.listen(PORT, hostname, function() {
    console.log("Server on port://" + hostname + ":" + PORT);
});