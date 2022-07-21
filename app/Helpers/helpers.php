<?php

if (! function_exists('	function activeRole(){
	')) {
	function activeRole(){
		return auth()->user()
			->roles()
			->where('role_id', auth()->user()->active_role)
			->first()
			->name;
	}
}

if (! function_exists('getRoles')) {
	function getRoles(){
		return auth()->user()
			->roles()
			->get();
	}
}

// if (! function_exists('getTransactions')) {
// 	function getTransactions(){
// 		return auth()->user()
// 			->roles()
// 			->where('roles.id', auth()->user()->active_role)
// 			->first()
// 			->transactions()
// 			->get();
// 	}
// }

if (! function_exists('getTransactionsCategories')) {
	function getTransactionsCategories(){
		return auth()->user()
			->roles()
			->where('roles.id', auth()->user()->active_role)
			->first()
			->transactions()
			->get()
			->groupBy('category');
	}
}





