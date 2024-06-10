$(document).ready(function() {
    fetchTasks();

    $('#addTaskForm').on('submit', function(e) {
        e.preventDefault();
        addTask();
    });

    $(document).on('click', '.delete-task', function() {
        const taskId = $(this).data('id');
        deleteTask(taskId);
    });

    $(document).on('change', '.task-completed', function() {
        const taskId = $(this).data('id');
        updateTask(taskId, $(this).is(':checked'));
    });
});

function fetchTasks() {
    $.get('/api/tasks', function(tasks) {
        let taskList = '';
        tasks.forEach(task => {
            taskList += `<li>
                <input type="checkbox" class="task-completed" data-id="${task.id}" ${task.completed ? 'checked' : ''}>
                ${task.title}
                <button class="delete-task" data-id="${task.id}">Delete</button>
            </li>`;
        });
        $('#taskList').html(taskList);
    });
}

function addTask() {
    const title = $('#newTask').val();
    $.post('/api/tasks', { title: title, completed: false }, function(task) {
        fetchTasks();
        $('#newTask').val('');
    });
}

function deleteTask(taskId) {
    $.ajax({
        url: `/api/tasks/${taskId}`,
        type: 'DELETE',
        success: function(result) {
            fetchTasks();
        }
    });
}

function updateTask(taskId, completed) {
    $.ajax({
        url: `/api/tasks/${taskId}`,
        type: 'PUT',
        data: { completed: completed },
        success: function(result) {
            fetchTasks();
        }
    });
}
