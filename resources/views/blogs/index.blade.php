<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Table</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    color: #333;
    margin: 0;
    padding: 20px;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

th {
    background-color: #f2f2f2;
    color: #333;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

    </style>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="/addBlog">Add Blog</a>
    <div class="container">
        <h1>Blog Posts</h1>
        <table class="blog-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th>Published Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $data as $row)
                <tr>
                    <td>{{ $row['title'] }}</td>
                    <td>{{ $row['desc'] }}</td>
                    <td>{{ $row['author'] }}</td>
                    <td>{{ $row['date'] }}</td>
                    <td><a href="/blogs/{{ $row['id'] }}/edit">Edit</a></td>
                    <td><form action="{{ url('/blogs/' . $row['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
