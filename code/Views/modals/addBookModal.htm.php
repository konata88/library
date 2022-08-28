<div class="ui modal" id="addBookModal">
    <div class="ui segment">
        <h2 class="ui header">Add new book</h2>
        <form class="ui form" action="/addBook" method="post" id="addBookForm">
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" required>
            </div>
            <div class="field">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description">
            </div>
            <div class="field">
                <label>Image url</label>
                <input type="text" name="image" placeholder="Image url">
            </div>
            <div class="field">
                <label>Publish year</label>
                <input type="number" name="year" placeholder="Year" required>
            </div>
            <div class="field">
                <label>Author</label>
                <select class="ui dropdown" name="author_id" id="author_id">
                </select>
            </div>

            <div class="field">
                <label>Type</label>
                <select class="ui dropdown" name="type_id" id="type_id">
                </select>
            </div>

            <button class="ui button" type="submit">Submit</button>
        </form>
    </div>
</div>