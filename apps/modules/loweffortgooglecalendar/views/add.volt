{% extends 'layout.volt' %}

{% block title %}Add New Idea{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

<div class="idea">
    <div class="card">
        <div class="card-body">
            <form action="/schedule/add" method="POST">
                <div class="form-group">
                    <label for="">Schedule Title</label>
                    <input type="text" class="form-control" name="scheduleTitle" required>
                    <label for="">Schedule Description</label>
                    <textarea name="scheduleDescription" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">User Name</label>
                    <input type="text" class="form-control" name="authorName" required>
                    <label for="">Schedule Date</label>
                    <input type="datetime" name="scheduleDate" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}

{% endblock %}