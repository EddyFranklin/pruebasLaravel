<?php

namespace App\Http\Controllers;
use App\Book;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportController extends Controller
{
  public function import()
  {
   Excel::load('D:\book.xlsx', function($reader) {

   foreach ($reader->get() as $book) {
   Book::create([
   'name' => $book->title,
   'author' =>$book->author,
   'year' =>$book->year
   ]);
     }
});
return Book::all();
  }
}
