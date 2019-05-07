
<h1>Create New Food Pantry</h1>
<form action="/articles/submit" method="post">
   <input name="_token" type="hidden" value="{{ csrf_token() }}"/>

  <div class="form-group">
    <label for="title">Name</label>
    <input type="text" class="form-control" id="title" name="name" aria-describedby="titleHelp" placeholder="Enter title">
    <small id="titleHelp" class="form-text text-muted">Enter the Article Title here.</small>
  </div>


  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="content_title" aria-describedby="titleHelp" placeholder="Enter title">
    <small id="titleHelp" class="form-text text-muted">Enter the Article Title here.</small>
  </div>

  <div class="form-group">
    <label for="body">Content Body</label>
    <textarea class="form-control" id="body" name="content_body"></textarea>
  </div>


    <div class="form-group">
      <label for="title">Category</label>
      <input type="text" class="form-control" id="title" name="categories" aria-describedby="titleHelp" placeholder="Enter title">
      <small id="titleHelp" class="form-text text-muted">Enter the Article Title here.</small>
    </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
