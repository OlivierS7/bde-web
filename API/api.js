var express = require('express');

var hostname = 'localhost';
const PORT = 8001;
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "projet_web";


var userController = require('./userController.js');
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

app.get('/users', (req, res) => userController.index(req, res));
app.get('/users/:id', (req, res) => userController.show(req, res));
app.post('/users', (req, res) => userController.store(req, res));
app.get('/connect', (req, res) => userController.connect(req, res));
app.put('/users/:id', (req, res) => userController.update(req, res));
app.patch('/users/:id', (req, res) => userController.update(req, res));
app.delete('/users/:id', (req, res) => userController.destroy(req, res));

app.listen(PORT, hostname, function() {
    console.log("Server on port://" + hostname + ":" + PORT);
});