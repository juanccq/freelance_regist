function autocomplete(input) {
    let suggestions = [];
    let currentFocus = null;

    function closeAllLists(elem) {
        const items = document.getElementsByClassName('autocomplete-items');
        for(let i = 0; i < items.length; i++) {
            if( elem != items[i] && elem != input ) {
                items[i].parentNode.removeChild(items[i]);
            }
        }
    }

    function removeActive(item) {
        for( let i = 0; i < item.length; i++ ) {
            item[i].classList.remove('autocomplete-active');
        }
    }

    function addActive(item) {
        if(!item) { return false; }

        removeActive(item);

        if( currentFocus >= item.length ) { currentFocus = 0; }
        if( currentFocus < 0 ) { currentFocus = item.length - 1; }

        item[currentFocus].classList.add('autocomplete-active');
    }

    async function callSearchMethod($searchText) {
        const hRequest = new Request( searchUserURL.replace('-1', $searchText) );

        const response = await fetch(hRequest, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })

        return await response.json();
    }

    input.addEventListener('input', async (e) => {
        const cVal = e.target.value;

        closeAllLists();
        if(!cVal) { return false; }

        suggestions = await callSearchMethod(cVal);
        let currentFocus = -1;

        const container = document.createElement('div');
        container.setAttribute('id', e.target.id + 'autocomplete-list');
        container.setAttribute('class', 'autocomplete-items');

        e.target.parentNode.appendChild(container);

        for(let i = 0; i < suggestions.length; i++) {
            const suggestion = document.createElement('div');
            const itemStr = suggestions[i].name + ' (' + suggestions[i].ci + ')';
            suggestion.innerHTML = itemStr.replace(cVal, '<strong>'+cVal+'</strong>');
            suggestion.innerHTML += '<input type="hidden" data-id="' + suggestions[i].id + '" value="' + itemStr + '">';
            suggestion.addEventListener('click', (e) => {
                input.value = e.target.getElementsByTagName('input')[0].value;
                const userId = document.getElementById('user_id');
                userId.value = e.target.getElementsByTagName('input')[0].getAttribute('data-id');
                closeAllLists();
                fillComplementaryData( userId.value );
            })

            container.appendChild(suggestion);
        }
    })

    function fillComplementaryData( userId ) {
        suggestions.forEach( (suggestion) => {
            if( suggestion.id == userId ) {
                document.getElementById('nombre-encargado').value = suggestion.name;
                document.getElementById('ci-encargado').value = suggestion.ci;
                document.getElementById('cargo-encargado').value = suggestion.cargo;
                return true;
            }
        })
    }

    input.addEventListener('keydown', (e) => {
        const container = document.getElementById(this.id + 'autocomplete-list');

        if( container ) { container = container.getElementsByTagName('div'); }

        if( e.keyCode == 40 ) { // arrow down
            currentFocus++;
            addActive(container);
        }
        else if( e.keyCode == 38 ) { // arrow up
            currentFocus--;
            addActive(container);
        }
        else if( e.keyCode == 13 ) { // enter
            e.preventDefault();

            if( currentFocus > -1 ) {
                if( container ) { container[currentFocus].click(); }
            }
        }
    })

    document.addEventListener('click', (e) => {
        closeAllLists(e.target);
    })
}