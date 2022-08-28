const updateBooks = function(search = '') {
    const url = search ? '/searchBook/'+search : '/books';
    fetch(url).then(res => res.json())
        .then((result) => {
            $('#loader').removeClass('active')
            const table = document.querySelector('#booksTable');
            table.innerHTML = '';
            result.forEach(element => {
                let imageElem;
                if (element.image) {
                    imageElem = document.createElement("img");
                    imageElem.src = element.image;
                } else {
                    imageElem = document.createTextNode("-");
                }

                const tr = table.insertRow();
                const image = tr.insertCell();
                image.appendChild(imageElem);
                const name = tr.insertCell();
                name.appendChild(document.createTextNode(element.name));
                const author = tr.insertCell();
                author.appendChild(document.createTextNode(element.author));
                const year = tr.insertCell();
                year.appendChild(document.createTextNode(element.publish_year));
                const description = tr.insertCell();
                description.appendChild(document.createTextNode(element.description ? element.description : '' ));
                const type = tr.insertCell();
                type.appendChild(document.createTextNode(element.book_type));

                const take = tr.insertCell();
                const takeButtons = document.createElement("div");
                takeButtons.innerHTML = ('<button class="ui primary button takeBookButton" data-book="'+element.id+'" data-title="'+element.name+'">Take</button>');
                take.appendChild(takeButtons)

                const actions = tr.insertCell();
                const actionsButtons = document.createElement("div");
                actionsButtons.innerHTML = ('<div><button class="ui primary button editBookButton" data-book="'+element.id+'">Edit</button></div><div class="deleteButton"><button class="ui primary button deleteBookButton" data-book="'+element.id+' " data-title="'+element.name+'">Delete</button></div>');
                actions.appendChild(actionsButtons)
            });
        }).catch((error) => {
        alert('bad data')
    });
}

const getAuthors = function(field, selected = '') {
    const selectedId = selected
    fetch('/authors').then(res => res.json()).then((result) => {
        const authors = document.querySelector(field)
        authors.innerHTML = '';

        result.forEach(element => {
            const selected = (element.id == selectedId) ? 'selected' : '';
            authors.innerHTML += '<option ' + selected + ' value="' + element.id + '">' + element.name + '</option>';
        });
    });
}

const getTypes = function(field, selected = '') {
    const selectedId = selected
    fetch('/bookTypes').then(res => res.json()).then((result) => {
        const types = document.querySelector(field)
        types.innerHTML = '';

        result.forEach(element => {
                const selected = (element.id == selectedId) ? 'selected' : '';
                types.innerHTML += '<option ' + selected + ' value="' + element.id + '">' + element.name + '</option>'
            }
        );
    })
}

const dateCheck = function (datesArray) {
    return function(date){
        let showFlag = true;
        datesArray.forEach(dates => {
            const fromTime = new Date(dates.from_time);
            const toTime = new Date(dates.to_time);
            const result = (date >= fromTime) && (date <= toTime)
            if (result) {
                showFlag = false;
            }
        })
        return [ showFlag ]
    }
}