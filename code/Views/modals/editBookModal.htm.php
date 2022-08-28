<div class="ui modal" id="editBookModal">
    <div class="ui segment">
        <h2 class="ui header">Update book</h2>
        <form class="ui form" action="/updateBook" method="post" id="editBookForm">
            <input type="hidden" name="id" id="update_id">
            <div class="field">
                <label>Name</label>
                <input type="text" name="name" placeholder="Name" id="update_name" required>
            </div>
            <div class="field">
                <label>Description</label>
                <input type="text" name="description" placeholder="Description" id="update_description">
            </div>
            <div class="field">
                <label>Image url</label>
                <input type="text" name="image" placeholder="Image url" id="update_image">
            </div>
            <div class="field">
                <label>Publish year</label>
                <input type="number" name="year" placeholder="Year" required id="update_year">
            </div>
            <div class="field">
                <label>Author</label>
                <select class="ui dropdown" name="author_id" id="update_author_id">
                </select>
            </div>
            <div class="field">
                <label>Type</label>
                <select class="ui dropdown" name="type_id" id="update_type_id">
                </select>
            </div>
            <button class="ui button" type="submit" id="updateBook">Submit</button>
        </form>
    </div>
</div>