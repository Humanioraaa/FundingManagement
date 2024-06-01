@extends('layouts.master')

@section('content')
<h1>Add Category</h1>
<form action="process_add_category.php" method="POST">
    <label for="categoryName">Category Name:</label><br>
    <input type="text" id="categoryName" name="categoryName" required><br><br>
    <input type="submit" value="Add Category">
</form>
@endsection
