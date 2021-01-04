<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/inscription', function () {
    return view('Agents.inscription ');
});*/
//Route::get('/modifier', 'ClientController@edit');

Route::get('/logout', function () {
    return view('logout');
});



Route::get('/home', 'Logincontroller@show')->name('home');

Route::get('/', 'Logincontroller@index' )->name('index');
Route::post('/welcome', 'Logincontroller@login' );


Route::get('/base','baseController@index')->name('index_base');


//produit
Route::get('/enregistrer', 'ProduitController@index' )->name('index_Prdt');
Route::post('/enregistrer','ProduitController@enregistrer' )->name('enregistrer_Prdt');
Route::get('/lister','ProduitController@lister' )->name('lister_Prdt');
Route::get('Produits/{Produit}/edit_Prdt','ProduitController@edit' )->name('Produits.edit');
Route::put('Produits/{Produit}','ProduitController@update' )->name('Produits.update'); 
Route::delete('Produits/{Produit}','ProduitController@destroy' )->name('Produits.destroy');


//agent
Route::get('/inscription', 'Agentcontroller@index' )->name('index_Ag');
Route::post('/inscription','Agentcontroller@enregistrer' )->name('enregistrer_Ag');
Route::get('/liste_Agent','Agentcontroller@lister' )->name('lister_Ag');
Route::get('Agents/{Agent}/edit_Ag','Agentcontroller@edit' )->name('Agents.edit');
Route::put('Agents/{Agent}','Agentcontroller@update' )->name('Agents.update'); 
Route::delete('Agents/{Agent}','Agentcontroller@destroy' )->name('Agents.destroy');
 

//categorie
Route::get('/insertion', 'CategorieController@index' )->name('index_Categ');
Route::post('/insertion','CategorieController@enregistrer' )->name('enregistrer_Categ');
Route::get('/liste_categorie','CategorieController@lister' )->name('lister_Categ');
Route::get('Categories/{Categorie}/edit_Cat','CategorieController@edit' )->name('Categories.edit');
Route::put('Categories/{Categorie}','CategorieController@update' )->name('Categories.update'); 
Route::delete('Categories/{Categorie}','CategorieController@destroy' )->name('Categories.destroy');
 


//emballage
Route::get('/inserer', 'EmballageController@index' )->name('index_Emb');
Route::post('/inserer','EmballageController@enregistrer' )->name('enregistrer_Emb');
Route::get('/liste_emballage','EmballageController@lister' )->name('lister_Emb');
Route::get('Emballages/{Emballage}/edit_Emb','EmballageController@edit' )->name('Emballages.edit');
Route::put('Emballages/{Emballage}','EmballageController@update' )->name('Emballages.update'); 
Route::delete('Emballages/{Emballage}','EmballageController@destroy' )->name('Emballages.destroy');
 


//client
Route::get('/enregistrement', 'ClientController@index' )->name('index_Clt');
Route::post('/enregistrement','ClientController@enregistrer' )->name('enregistrer_Clt');
Route::get('/liste_client','ClientController@lister' )->name('lister_Clt'); 
Route::get('/liste_client1','ClientController@lister1' )->name('lister_Clt1'); 
Route::get('Clients/{Client}/modifier','ClientController@edit' )->name('Clients.edit');
Route::put('Clients/{Client}','ClientController@update' )->name('Clients.update'); 
Route::delete('Clients/{Client}','ClientController@destroy' )->name('Clients.destroy');
    

//fournisseur
Route::get('/inscrire', 'FournisseurController@index' )->name('index_Frs');
Route::post('/inscrire','FournisseurController@enregistrer' )->name('enregistrer_Frs');
Route::get('/liste_fournisseur','FournisseurController@lister' )->name('lister_Frs');
Route::get('Fournisseurs/{Fournisseur}/edit_Frs','FournisseurController@edit' )->name('Fournisseurs.edit');
Route::put('Fournisseurs/{Fournisseur}','FournisseurController@update' )->name('Fournisseurs.update'); 
Route::delete('Fournisseurs/{Fournisseur}','FournisseurController@destroy' )->name('Fournisseurs.destroy');    



//entree en stock
Route::get('/stock', 'Livrer2Controller@index' )->name('index_Livr2');
Route::post('/stock','Livrer2Controller@enregistrer' )->name('enregistrer_Livr2');
Route::get('/entree','Livrer2Controller@lister' )->name('lister_Livr2');  
Route::get('Livrer2/{Livr2}/edit_Livr2','Livrer2Controller@edit' )->name('Livrer2.edit');
Route::put('Livrer2/{Livr2}','Livrer2Controller@update' )->name('Livrer2.update'); 
Route::delete('Livrer2/{Livr2}','Livrer2Controller@destroy' )->name('Livrer2.destroy');  

//vehicule
Route::get('/inserer_Veh', 'VehiculeController@index' )->name('index_Veh');
Route::post('/inserer_Veh','VehiculeController@enregistrer' )->name('enregistrer_Veh');
Route::get('/liste_Veh','VehiculeController@lister' )->name('lister_Veh');  
Route::get('Vehicules/{Vehicule}/edit_Veh','VehiculeController@edit' )->name('Vehicules.edit');
Route::put('Vehicules/{Vehicule}','VehiculeController@update' )->name('Vehicules.update'); 
Route::delete('Vehicules/{Vehicule}','VehiculeController@destroy' )->name('Vehicules.destroy');


//commande
Route::get('/inserer_Cmd', 'CommandeController@index' )->name('index_Cmd');
Route::post('cart/index','CommandeController@enregistrer')->name('enregistrer_Cmd');
//Route::post('/inserer_Cmd',['as'=>'enregistrer_Cmd','uses'=>'CommandeController@enregistrer' ]);
Route::get('/liste_Cmd','CommandeController@lister' )->name('lister_Cmd');
Route::get('Commandes/{Commande}/edit_Cmd','CommandeController@edit' )->name('Commandes.edit');
Route::put('Commandes/{Commande}','CommandeController@update' )->name('Commandes.update'); 
Route::delete('Commandes/{Commande}','CommandeController@destroy' )->name('Commandes.destroy');  

//Route::get('/inserer_porter', 'PorterController@index' )->name('index_porter');
//Route::post('/inserer_porter','PorterController@enregistrer' )->name('enregistrer_porter');
Route::get('/recu/{code}',[
    'as' => 'facture_client',
    'uses'=> 'CommandeController@client'
]);

Route::get('/pdf/{numero_client}',[
    'as' => 'make',
    'uses'=> 'FactureController@generate_pdf'
]);
//facture
//Route::get('/inserer_fact', 'FactureController@index' )->name('index_fact');
Route::post('/tout/{code}','FactureController@insert' )->name('insert_fact');
Route::post('/paiement/{code}','FactureController@enregistrer' )->name('enregistrer_fact');
Route::get('/liste_fact','FactureController@lister' )->name('lister_fact');
Route::get('Factures/{Facture}/edit_fact','FactureController@edit' )->name('Factures.edit');
Route::put('Factures/{Facture}','FactureController@update' )->name('Factures.update'); 
Route::delete('Factures/{Facture}','FactureController@destroy' )->name('Factures.destroy'); 
Route::get('/facture/{num_client}','FactureController@getPdf') ;

Route::get('/inserer_comporter', 'ComporterController@index' )->name('index_comporter');
Route::post('/inserer_comporter','ComporterController@enregistrer' )->name('enregistrer_comporter');

//reglement
Route::get('/inserer_reglem', 'ReglementController@index' )->name('index_reglem');
Route::post('/inserer_reglem','ReglementController@enregistrer' )->name('enregistrer_reglem');
Route::get('/liste_reglem','ReglementController@lister' )->name('lister_reglem');
Route::get('Reglements/{Reglement}/edit_reglem','ReglementController@edit' )->name('Reglements.edit');
Route::put('Reglements/{Reglement}','ReglementController@update' )->name('Reglements.update'); 
Route::delete('Reglements/{Reglement}','ReglementController@destroy' )->name('Reglements.destroy');  

Route::get('/inserer_entrainer', 'EntrainerController@index' )->name('index_entrainer');
Route::post('/inserer_entrainer','EntrainerController@enregistrer' )->name('enregistrer_entrainer');

//Route::resource('panier', 'CartController')->only(['index', 'store', 'update', 'destroy']);
Route::post('/panier/ajouter',['as'=>'cart.store','uses'=>'CartController@store' ]);
Route::get('/panier/{numero_client}','CartController@index')->name('cart.index');
Route::patch('/panier/{rowId}','CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}','CartController@destroy')->name('cart.destroy');
Route::get('/panier/{id}','CartController@edit')->name('cart.edit');


Route::get('/videpanier',function(){
    Cart::destroy();
});

//chart
Route::get('/index','BloodPressureController@index');



//utilisateur
//Route::get('/boutique','ProductController@index');

Route::get('/clientutile','ProductController@index')->name('ind_Clt');
Route::get('/clientsutile','ProductController@lister')->name('liste_Clt');
Route::get('/commande','ProductController@commande')->name('ind_Cmd');
Route::get('/commandes','ProductController@commande_liste')->name('liste_Cmd');
Route::get('/produitsutile','ProductController@produit')->name('liste_Prdt');
Route::get('/reglements','ProductController@reglement')->name('liste_reglem');

//sortie
Route::get('/sortie','Livrer2Controller@sortie')->name('liste_sortie');

//Etats
Route::get('/credit', function () {
    return view('Partials.credit_search');
})->name('credit_search');

Route::get('/produit', function () {
    return view('Partials.produit_search');
})->name('produit_search');

Route::get('/model', function () {
    return view('Partials.model_search');
})->name('model_search');

Route::get('/client', function () {
    return view('Partials.client_search');
})->name('client_search');

Route::get('/categorie', function () {
    return view('Partials.categorie_search');
})->name('categorie_search');

Route::get('/achatM', function () {
    return view('Partials.achatM_search');
})->name('achatM_search');

Route::get('/achatP', function () {
    return view('Partials.achatP_search');
})->name('achatP_search');

Route::get('/credits','ReglementController@search')->name('credit');
Route::post('/produits','ReglementController@produit')->name('produit');
Route::post('/models','ReglementController@model')->name('model');
Route::post('/clients','ReglementController@client')->name('client');
Route::post('/categories','ReglementController@categorie')->name('categorie');
Route::post('/achatMs','ReglementController@achatM')->name('achatM');
Route::post('/achatPs','ReglementController@achatP')->name('achatP');
