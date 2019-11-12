function userController() {
    this.index = function(req, res) {
        this.connection.query('SELECT * FROM users', (err, result) => {
            if (err) throw err;
            res.json(result);
        });
    };

    this.connect = function(req, res) {
        this.connection.query('SELECT user_id, user_firstname, user_lastname, user_mail, user_password, status_name, campus_name FROM users INNER JOIN status ON users.status_id = status.status_id INNER JOIN campus ON users.campus_id = campus.campus_id WHERE user_mail = ?', req.body.mail, (err, result) => {
            if (err) throw err;
            res.json(result);
        });
    }

    this.show = function(req, res) {
        this.connection.query('SELECT * FROM users WHERE user_id = ?', req.params.id, (err, result) => {
            if (err) throw err;
            res.json(result);
        });
    };

    this.store = function(req, res) {
        var values = {
            user_firstname: req.body.firstname,
            user_lastname: req.body.lastname,
            user_mail: req.body.mail,
            user_password: req.body.password,
            campus_id: req.body.campus
        };
        this.connection.query('INSERT INTO users SET ?', values, (err, result) => {
            if (err) throw err;
            res.json(values);
        });
    };

    this.destroy = function(req, res) {
        this.connection.query('DELETE FROM users WHERE user_id = ?', req.params.id, (err, result) => {
            if (err) throw err;
            res.end("User destroyed");
        });
    };

    this.update = function(req, res) {
        var values = {
            user_firstname: req.body.firstname,
            user_lastname: req.body.lastname,
            user_mail: req.body.mail,
            user_password: req.body.password,
            campus_id: req.body.campus
        };
        this.connection.query('UPDATE users SET ? WHERE user_id = ?', [values, req.params.id], (err, result) => {
            if (err) throw err;
            res.json(values);
        });
    };
};

module.exports = new userController();