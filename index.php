<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multi-Step Form with Progress Bar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .progress {
            height: 25px;
        }
        .progress-bar {
            font-weight: bold;
            line-height: 25px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="mx-auto" style="max-width: 600px;">
        <h2 class="text-center mb-4">Multi-Step Form</h2>
        <!-- Progress Bar -->
        <div class="progress mb-4">
            <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Step 1 of 3</div>
        </div>

        <form id="multiStepForm">
            <!-- Step 1 -->
            <div id="step1" class="step active">
                <!-- Form fields for Step 1 go here -->
                <h4>Step 1: Basic Information & Needs</h4>
                <!-- Example Input -->
                <div class="form-group">
                    <label for="fullName">Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                </div>
                <!-- Add other inputs as per specifications -->
                <div class="text-right">
                    <button type="button" class="btn btn-primary" id="nextToStep2">Next</button>
                </div>
            </div>
            <!-- Step 2 -->
            <div id="step2" class="step">
                <!-- Form fields for Step 2 go here -->
                <h4>Step 2: Notion Setup Review & Improvement</h4>
                <!-- Example Input -->
                <div class="form-group">
                    <label for="notionDuration">Duration using Notion</label>
                    <select class="form-control" id="notionDuration" name="notionDuration" required>
                        <option value=""><-- Select an option --></option>
                        <option>< 6 months</option>
                        <option>6-12 months</option>
                        <option>1-2 years</option>
                        <option>More than 2 years</option>
                    </select>
                </div>
                <!-- Add other inputs as per specifications -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" id="backToStep1">Back</button>
                    <button type="button" class="btn btn-primary" id="nextToStep3">Next</button>
                </div>
            </div>
            <!-- Step 3 -->
            <div id="step3" class="step">
                <!-- Form fields for Step 3 go here -->
                <h4>Step 3: New Notion Setup & Needs Assessment</h4>
                <!-- Example Input -->
                <div class="form-group">
                    <label for="growthObjectives">Personal Growth Objectives with Notion</label>
                    <select multiple class="form-control" id="growthObjectives" name="growthObjectives[]" required>
                        <option>Time management</option>
                        <option>Task prioritization</option>
                        <option>Project planning</option>
                        <option>Collaboration</option>
                        <option>Other</option>
                    </select>
                </div>
                <!-- Add other inputs as per specifications -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" id="backToStep2">Back</button>
                    <button type="submit" class="btn btn-success" id="submitForm">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    // JavaScript for form navigation and progress bar
    $(document).ready(function() {
        var currentStep = 1;
        var totalSteps = 3;

        function updateProgressBar(step) {
            var percent = (step / totalSteps) * 100;
            $('#progressBar')
                .css('width', percent + '%')
                .attr('aria-valuenow', percent)
                .text('Step ' + step + ' of ' + totalSteps);
        }

        function showStep(step) {
            $('.step').removeClass('active');
            $('#step' + step).addClass('active');
            updateProgressBar(step);
        }

        $('#nextToStep2').click(function() {
            currentStep = 2;
            showStep(currentStep);
        });

        $('#backToStep1').click(function() {
            currentStep = 1;
            showStep(currentStep);
        });

        $('#nextToStep3').click(function() {
            currentStep = 3;
            showStep(currentStep);
        });

        $('#backToStep2').click(function() {
            currentStep = 2;
            showStep(currentStep);
        });

        $('#multiStepForm').submit(function(e) {
            e.preventDefault();
            // Handle form submission
            alert('Form submitted successfully!');
        });
    });
</script>
</body>
</html>
