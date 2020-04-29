const searchFilter = () => {
    const searchData = [];
    const tableEl = document.getElementById('portexe-data-table');
    Array.from(tableEl.children[1].children).forEach(_bodyRowEl => {
        searchData.push(Array.from(_bodyRowEl.children).map(_cellEl => {
            return _cellEl.innerHTML;
        }));
    });
    return searchData;
};

const createSearchElement = () => {
    const el = document.createElement('input');
    el.classList.add('portexe-search-input');
    el.id = 'portexe-search-input';
    return el;
};

const refreshTable = (data) => {
    const tableBody = document.getElementById('portexe-data-table').children[1];
    tableBody.innerHTML = '';
    data.forEach(_row => {
        const currentRow = document.createElement('tr');
        _row.forEach(_dataItem => {
            const currentCell = document.createElement('td');
            currentCell.innerText = _dataItem;
            currentRow.appendChild(currentCell);
        });
        tableBody.appendChild(currentRow);
    })
};

const init = () => {
    document.getElementById('portexe-search-root').appendChild(createSearchElement());
    const initialTableData = searchFilter();
    const searchInput = document.getElementById('portexe-search-input');
    searchInput.addEventListener('keyup', (e) => {
        refreshTable(search(initialTableData, e.target.value));
    });

};

const search = (arr, searchTerm) => {
    if (!searchTerm) return arr;
    return arr.filter(_row => {
        return _row.find(_item => _item.toLowerCase().includes(searchTerm.toLowerCase()));
    })
};


export default init();
