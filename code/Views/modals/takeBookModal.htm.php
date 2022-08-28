<div class="ui modal" id="takeBookModal">
    <div class="ui segment">
        <h2 class="ui header">Take book</h2>
        <form class="ui form" id="takeBookForm">
            <input type="hidden" name="book_id" id="takeBookId">
            <p>Please select user and From/To dates</p>
            <div class="field">
                <label>User</label>
                <select class="ui dropdown" name="user_id" id="user_id">
                </select>
            </div>
            <div class="field">
                <label>From</label>
                <input type="text" id="datepicker_from" name="from" autocomplete="off" required>
            </div>
            <div class="field">
                <label>To</label>
                <input type="text" id="datepicker_to" name="to" autocomplete="off" required>
            </div>
            <button class="ui button" type="submit" id="takeBook">Submit</button>
        </form>
    </div>
</div>