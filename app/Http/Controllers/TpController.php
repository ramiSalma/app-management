<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\DB;

class TpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             //======QUESTION 1
             $stagiaires = DB::select("select * from stagiaires");



             //======QUESTION 2
             $with_id = DB::table('stagiaires')->where('id','10');



             //========QUESTION 3
             $name_and_email = DB::table('stagiaires')->select("name","email")->get();



             //========QUESTION 7
             $more_twenty = DB::select("select * from stagiaires where age < 20");


             //=======QUESTION 8
             $order_by_name = DB::select("select * from stagiaires order by name");



             //========QUESTION 10
             $total = DB::select('SELECT COUNT(*) from stagiaires as total');
             $count = DB::table('stagiaires')->count();

            //========QUESTION 9
            $stagiaires = DB::table('stagiaires')->where('created_at', '>', '2024-01-01')->get();

             //========QUESTION 11
             $moyenne_age = DB::select('SELECT AVG(age) from stagiaires as moyenne_age;');
             $avg_age = DB::table('stagiaires')->avg('age');



             //========QUESTION 12
             //$name = DB::select('SELECT * from stagiaires where name = "david" ');
             $where_name = DB::table('stagiaires')->where('nom', 'salma')->get();


             //========QUESTION 13
             //$name = DB::select('SELECT * from stagiaires where name LIKE "J%" ');
             $name = DB::table('stagiaires')->where('prenom', 'like', 'J%')->get();


             //========QUESTION 14
             $stagiaires = DB::table('stagiaires')->paginate(10);


             //========QUESTION 15 
             //$grouped_byAge = DB::select("SELECT age, COUNT(*) AS total FROM stagiaires GROUP BY age;");
             $grouped_byAge = DB::table('stagiaires')->select('age', DB::raw('count(*) as total'))->groupBy('age')->get();

             
             
             
             //=======QUESTION 16
             $stagiaires = DB::table('stagiaires')
             ->join('formations', 'stagiaires.id', '=', 'formations.stagiaire_id')
             ->select('stagiaires.*', 'formations.nom as formation')
             ->get();
             
             //=======QUESTION 17
             DB::transaction(function () {
                 DB::table('stagiaires')->insert([
                     'nom' => 'Durand',
                     'prenom' => 'Paul',
                     'age' => 24
                    ]);
                });
                
                //=======QUESTION 18
                $exists = DB::table('stagiaires')->where('id', '15')->exists();
                
                //=======QUESTION 19
                $stagiaires = DB::table('stagiaires')->whereBetween('age', [20, 25])->get();
                
                //=======QUESTION 20
                DB::table('stagiaires')->truncate();
                
                //=======QUESTION 21
                $stagiaires = DB::table('stagiaires')->select('nom as lastname', 'prenom as firstname')->get();
                
                //=======QUESTION 22
                $stagiaires = DB::table('stagiaires')->whereDate('created_at', today())->get();
                
                //=======QUESTION 23
                $stagiaires = DB::table('stagiaires')->where('updated_at', '>=', now()->subDays(7))->get();
                
                //=======QUESTION 24
                $stagiaires = DB::table('stagiaires')->where('age', '>', 20)->orWhere('nom', 'Dupont')->get();
                
                //======QESTION 25
                $stagiaires = DB::table('stagiaires')->whereNull('age')->get();
                
                //=======QUESTION 26
                $moyenneNotes = DB::table('notes')
                ->select('stagiaire_id', DB::raw('AVG(note) as moyenne'))
                ->groupBy('stagiaire_id')
                ->get();
                
                //=======QUESTION 27
                $stagiaires = DB::table('stagiaires')
                ->select('id', 'nom', 'prenom', 'age', DB::raw('"actuel" as type'))
                ->union(
                    DB::table('anciens_stagiaires')->select('id', 'nom', 'prenom', 'age', DB::raw('"ancien" as type'))
                    )
                    ->get();
                    
                //=======QUESTION 28
                $stagiaires = DB::table('notes')
                ->select('stagiaire_id', DB::raw('AVG(note) as moyenne'))
                ->groupBy('stagiaire_id')
                ->having('moyenne', '>', 15)
                ->get();
            
                
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


