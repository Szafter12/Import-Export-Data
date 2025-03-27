window.addEventListener('DOMContentLoaded', function () {
	const counter = document.querySelector('#columnCount')
	const form = document.querySelector('#form')
	const columnContainer = document.querySelector('.columnForms')
	const errorBox = document.querySelector('.error')
	const successBox = document.querySelector('.success')
	const sendBtn = document.querySelector('#sendBtn')
	let columnNumber = 0

	const setColumnNumber = () => {
		columnNumber = counter.value
		columnContainer.innerHTML = ''
		for (let i = 0; i < columnNumber; i++) {
			const column = document.createElement('input')
			column.setAttribute('type', 'text')
			column.setAttribute('placeholder', 'Column ' + (i + 1))
			column.setAttribute('name', 'columns[]')
			column.classList.add('form-control')
			column.classList.add('w-25')
			columnContainer.appendChild(column)
		}
	}

	async function handleData(e) {
		e.preventDefault()
		successBox.textContent = ''
		errorBox.textContent = ''

		const requiredFields = [
			document.getElementById('sheet'),
			document.getElementById('tableName'),
			document.getElementById('columnCount'),
		]

		const emptyFields = requiredFields.filter(field => {
			if (field.type === 'file') {
				return field.files.length === 0
			}
			return field.value.trim() === ''
		})

		if (emptyFields.length > 0) {
			errorBox.textContent = 'All fields are required'
			return
		}

		const tableName = document.getElementById('tableName').value.trim()
		const columnCount = document.getElementById('columnCount').value

		if (!/^[a-zA-Z0-9_]+$/.test(tableName)) {
			errorBox.textContent = 'Invalid table name'
			return
		}

		if (columnCount < 1 || columnCount > 20) {
			errorBox.textContent = 'Column count must be between 1 and 20'
			return
		}

		const columnInputs = document.querySelectorAll('input[name="columns[]"]')
		const columnNames = Array.from(columnInputs).map(input => input.value.trim())

		const uniqueColumnNames = new Set(columnNames)
		if (uniqueColumnNames.size !== columnNames.length) {
			errorBox.textContent = 'Column names must be unique'
			return
		}

		const invalidColumnNames = columnNames.filter(name => !/^[a-zA-Z0-9_]+$/.test(name))
		if (invalidColumnNames.length > 0) {
			errorBox.textContent = 'Invalid column names: ' + invalidColumnNames.join(', ')
			return
		}

		const formData = new FormData(this)

		try {
			errorBox.textContent = ''
			successBox.textContent = 'Loading...'
			sendBtn.disabled = true

			const res = await fetch('http://localhost/Import-Export-Data/src/includes/readSheet.php', {
				method: 'POST',
				body: formData,
			})
			const data = await res.json()

			console.log(data)

			if (data.status === 'success') {
				errorBox.textContent = ''
				successBox.textContent = data.message
				form.reset()
				setColumnNumber()
			} else {
				successBox.textContent = ''
				errorBox.textContent = data.message
			}

			sendBtn.disabled = false
		} catch (error) {
			errorBox.textContent = 'Error: ' + error
		}
	}

	counter.addEventListener('change', setColumnNumber)
	form.addEventListener('submit', handleData)
})
