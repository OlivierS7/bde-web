function userController(){
	this.index = function(req, res){
		this.connection.query('SELECT * FROM users', (err, result) => {
			if (err) throw err;
			res.json(result);
		});
	};

	this.show = function(req, res){
		this.connection.query('SELECT * FROM users WHERE `id` = ?', req.params.id, (err, result) => {
			if (err) throw err;
			res.json(result);
		});
	};

	this.store = function(req, res){
		var values = {user_firstname:req.body.firstname, user_lastname:req.body.lastname, user_mail:req.body.mail,
		user_password:req.body.password, campus_id:req.body.campus};
		this.connection.query('INSERT INTO users SET ?', values, (err, result) => {
			if (err) throw err;
			res.json(values);
		});
	};

	this.destroy = function(req, res){
		this.connection.query('DELETE FROM users WHERE id = ?', req.params.id, (err, result) => {
			if (err) throw err;
			res.end("User destroyed");
		});
	};

	this.update = function(req, res){
		var values = {user_firstname:req.body.firstname, user_lastname:req.body.lastname, user_mail:req.body.mail,
		user_password:req.body.password, campus_id:req.body.campus};
		this.connection.query('UPDATE users SET ? WHERE id = ?', [values, req.params.id], (err, result) => {
			if (err) throw err;
			res.json(values);
		});
	};
};

module.exports = new userController();