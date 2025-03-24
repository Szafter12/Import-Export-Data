window.addEventListener('DOMContentLoaded', function () {
	const counter = document.querySelector('#columnCount')
	const columnContainer = document.querySelector('.columnForms')
	let columnNumber = 0

	const setColumnNumber = () => {
		columnNumber = counter.value
		columnContainer.innerHTML = ''
		for (let i = 0; i < columnNumber; i++) {
			const column = document.createElement('input')
			column.setAttribute('type', 'text')
			column.setAttribute('placeholder', 'Column ' + (i + 1))
			column.setAttribute('name', 'columns[]')
			columnContainer.appendChild(column)
		}
	}

	counter.addEventListener('change', setColumnNumber)
})
