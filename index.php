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
        .other-input {
            display: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="mx-auto" style="max-width: 700px;">
        <h2 class="text-center mb-4">Multi-Step Form</h2>
        <!-- Progress Bar -->
        <div class="progress mb-4">
            <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Step 1 of 3</div>
        </div>

        <form id="multiStepForm">
            <!-- Step 1 -->
            <div id="step1" class="step active">
                <h4>Step 1: Basic Information & Needs</h4>
                <!-- Name -->
                <div class="form-group">
                    <label for="fullName">Name *</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter your full name" required>
                </div>
                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" required>
                </div>
                <!-- Current Role/Position -->
                <div class="form-group">
                    <label for="currentRole">Current Role/Position *</label>
                    <input type="text" class="form-control" id="currentRole" name="currentRole" placeholder="Your job title or role" required>
                </div>
                <!-- Company/Organization -->
                <div class="form-group">
                    <label for="company">Company/Organization *</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Company or organization name" required>
                </div>
                <!-- Years in Current Role -->
                <div class="form-group">
                    <label for="yearsInRole">Years in Current Role *</label>
                    <input type="number" class="form-control" id="yearsInRole" name="yearsInRole" placeholder="Enter years" required>
                </div>
                <!-- Primary Career Goals -->
                <div class="form-group">
                    <label for="careerGoals">Primary Career Goals *</label>
                    <select multiple class="form-control" id="careerGoals" name="careerGoals[]" required>
                        <option>Advance in current field</option>
                        <option>Transition to a new role</option>
                        <option>Enhance skill set</option>
                        <option>Increase leadership skills</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="careerGoalsOther" name="careerGoalsOther" placeholder="Please specify">
                </div>
                <!-- Primary Organizational Tools Used -->
                <div class="form-group">
                    <label for="organizationalTools">Primary Organizational Tools Used *</label>
                    <select multiple class="form-control" id="organizationalTools" name="organizationalTools[]" required>
                        <option>Evernote</option>
                        <option>Apple Reminders</option>
                        <option>Google Keep</option>
                        <option>Notion</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="organizationalToolsOther" name="organizationalToolsOther" placeholder="Please specify">
                </div>
                <!-- Describe Current Organizational System -->
                <div class="form-group">
                    <label for="currentSystem">Describe Current Organizational System *</label>
                    <textarea class="form-control" id="currentSystem" name="currentSystem" placeholder="Briefly describe your system for managing tasks" required></textarea>
                </div>
                <!-- Biggest Challenges in Current Role -->
                <div class="form-group">
                    <label for="challenges">Biggest Challenges in Current Role *</label>
                    <select multiple class="form-control" id="challenges" name="challenges[]" required>
                        <option>Time management</option>
                        <option>Team collaboration</option>
                        <option>Task prioritization</option>
                        <option>Skill development</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="challengesOther" name="challengesOther" placeholder="Please specify">
                </div>
                <!-- Primary Motivation for Using Organizational Tools -->
                <div class="form-group">
                    <label for="motivation">Primary Motivation for Using Organizational Tools *</label>
                    <select class="form-control" id="motivation" name="motivation" required>
                        <option value="">-- Select an option --</option>
                        <option>Productivity</option>
                        <option>Goal tracking</option>
                        <option>Team collaboration</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="motivationOther" name="motivationOther" placeholder="Please specify">
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" id="nextToStep2">Next</button>
                </div>
            </div>

            <!-- Step 2 -->
            <div id="step2" class="step">
                <h4>Step 2: Notion Setup Review & Improvement</h4>
                <!-- Duration using Notion -->
                <div class="form-group">
                    <label for="notionDuration">Duration using Notion *</label>
                    <select class="form-control" id="notionDuration" name="notionDuration" required>
                        <option value="">-- Select an option --</option>
                        <option>< 6 months</option>
                        <option>6-12 months</option>
                        <option>1-2 years</option>
                        <option>More than 2 years</option>
                    </select>
                </div>
                <!-- Frequency of Notion Use -->
                <div class="form-group">
                    <label for="notionFrequency">Frequency of Notion Use *</label>
                    <select class="form-control" id="notionFrequency" name="notionFrequency" required>
                        <option value="">-- Select an option --</option>
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option>Monthly</option>
                        <option>Rarely</option>
                    </select>
                </div>
                <!-- Current Notion Setup Structure -->
                <div class="form-group">
                    <label for="notionStructure">Current Notion Setup Structure *</label>
                    <textarea class="form-control" id="notionStructure" name="notionStructure" placeholder="Describe your workspace setup (e.g., projects, notes)" required></textarea>
                </div>
                <!-- Primary Notion Goals -->
                <div class="form-group">
                    <label for="notionGoals">Primary Notion Goals *</label>
                    <select multiple class="form-control" id="notionGoals" name="notionGoals[]" required>
                        <option>Manage tasks</option>
                        <option>Project planning</option>
                        <option>Note-taking</option>
                        <option>Collaboration</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="notionGoalsOther" name="notionGoalsOther" placeholder="Please specify">
                </div>
                <!-- Most Used Notion Features -->
                <div class="form-group">
                    <label for="notionFeatures">Most Used Notion Features *</label>
                    <select multiple class="form-control" id="notionFeatures" name="notionFeatures[]" required>
                        <option>Database</option>
                        <option>Kanban boards</option>
                        <option>Calendar</option>
                        <option>Notes</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="notionFeaturesOther" name="notionFeaturesOther" placeholder="Please specify">
                </div>
                <!-- Areas for Improvement -->
                <div class="form-group">
                    <label for="areasForImprovement">Areas for Improvement *</label>
                    <textarea class="form-control" id="areasForImprovement" name="areasForImprovement" placeholder="Describe areas you’d like to improve in your Notion setup" required></textarea>
                </div>
                <!-- Primary Challenges in Current Setup -->
                <div class="form-group">
                    <label for="setupChallenges">Primary Challenges in Current Setup *</label>
                    <select multiple class="form-control" id="setupChallenges" name="setupChallenges[]" required>
                        <option>Navigation</option>
                        <option>Organizational complexity</option>
                        <option>Lack of templates</option>
                        <option>Time management</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="setupChallengesOther" name="setupChallengesOther" placeholder="Please specify">
                </div>
                <!-- Additional Tools Integrated with Notion -->
                <div class="form-group">
                    <label for="integratedTools">Additional Tools Integrated with Notion *</label>
                    <select multiple class="form-control" id="integratedTools" name="integratedTools[]" required>
                        <option>Google Drive</option>
                        <option>Slack</option>
                        <option>Trello</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="integratedToolsOther" name="integratedToolsOther" placeholder="Please specify">
                </div>
                <!-- Preference for Notion Integration Types -->
                <div class="form-group">
                    <label for="integrationPreference">Preference for Notion Integration Types *</label>
                    <select class="form-control" id="integrationPreference" name="integrationPreference" required>
                        <option value="">-- Select an option --</option>
                        <option>Automations</option>
                        <option>Manual integration</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="integrationPreferenceOther" name="integrationPreferenceOther" placeholder="Please specify">
                </div>
                <!-- Potential New Feature Preferences -->
                <div class="form-group">
                    <label for="newFeaturePreferences">Potential New Feature Preferences *</label>
                    <select multiple class="form-control" id="newFeaturePreferences" name="newFeaturePreferences[]" required>
                        <option>Automation tools</option>
                        <option>Custom templates</option>
                        <option>Third-party integrations</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="newFeaturePreferencesOther" name="newFeaturePreferencesOther" placeholder="Please specify">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" id="backToStep1">Back</button>
                    <button type="button" class="btn btn-primary" id="nextToStep3">Next</button>
                </div>
            </div>

            <!-- Step 3 -->
            <div id="step3" class="step">
                <h4>Step 3: New Notion Setup & Needs Assessment</h4>
                <!-- Personal Growth Objectives with Notion -->
                <div class="form-group">
                    <label for="growthObjectives">Personal Growth Objectives with Notion *</label>
                    <select multiple class="form-control" id="growthObjectives" name="growthObjectives[]" required>
                        <option>Time management</option>
                        <option>Task prioritization</option>
                        <option>Project planning</option>
                        <option>Collaboration</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="growthObjectivesOther" name="growthObjectivesOther" placeholder="Please specify">
                </div>
                <!-- Desired Notion Features -->
                <div class="form-group">
                    <label for="desiredFeatures">Desired Notion Features *</label>
                    <select multiple class="form-control" id="desiredFeatures" name="desiredFeatures[]" required>
                        <option>Task automation</option>
                        <option>Collaborative workspace</option>
                        <option>Goal tracking</option>
                        <option>Custom dashboards</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="desiredFeaturesOther" name="desiredFeaturesOther" placeholder="Please specify">
                </div>
                <!-- Ideal Notion Setup Vision -->
                <div class="form-group">
                    <label for="idealSetup">Ideal Notion Setup Vision *</label>
                    <textarea class="form-control" id="idealSetup" name="idealSetup" placeholder="Describe your ideal Notion workspace and workflow" required></textarea>
                </div>
                <!-- Primary Focus Areas in New Setup -->
                <div class="form-group">
                    <label for="focusAreas">Primary Focus Areas in New Setup *</label>
                    <select multiple class="form-control" id="focusAreas" name="focusAreas[]" required>
                        <option>Personal productivity</option>
                        <option>Project management</option>
                        <option>Team collaboration</option>
                        <option>Tracking goals</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="focusAreasOther" name="focusAreasOther" placeholder="Please specify">
                </div>
                <!-- Specific Workflow Preferences -->
                <div class="form-group">
                    <label for="workflowPreferences">Specific Workflow Preferences *</label>
                    <select multiple class="form-control" id="workflowPreferences" name="workflowPreferences[]" required>
                        <option>Daily task tracking</option>
                        <option>Weekly planning</option>
                        <option>Project milestones</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="workflowPreferencesOther" name="workflowPreferencesOther" placeholder="Please specify">
                </div>
                <!-- Additional Integrations Needed -->
                <div class="form-group">
                    <label for="additionalIntegrations">Additional Integrations Needed *</label>
                    <select multiple class="form-control" id="additionalIntegrations" name="additionalIntegrations[]" required>
                        <option>Google Calendar</option>
                        <option>Slack</option>
                        <option>Zapier</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="additionalIntegrationsOther" name="additionalIntegrationsOther" placeholder="Please specify">
                </div>
                <!-- Level of Notion Customization Needed -->
                <div class="form-group">
                    <label for="customizationLevel">Level of Notion Customization Needed *</label>
                    <select class="form-control" id="customizationLevel" name="customizationLevel" required>
                        <option value="">-- Select an option --</option>
                        <option>Basic templates</option>
                        <option>Moderate customization</option>
                        <option>Advanced customization</option>
                    </select>
                </div>
                <!-- Current Tools to Replace with Notion -->
                <div class="form-group">
                    <label for="toolsToReplace">Current Tools to Replace with Notion *</label>
                    <select multiple class="form-control" id="toolsToReplace" name="toolsToReplace[]" required>
                        <option>Trello</option>
                        <option>Asana</option>
                        <option>Google Docs</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="toolsToReplaceOther" name="toolsToReplaceOther" placeholder="Please specify">
                </div>
                <!-- Potential Barriers to Notion Adoption -->
                <div class="form-group">
                    <label for="adoptionBarriers">Potential Barriers to Notion Adoption *</label>
                    <select multiple class="form-control" id="adoptionBarriers" name="adoptionBarriers[]" required>
                        <option>Learning curve</option>
                        <option>Compatibility</option>
                        <option>Time to implement</option>
                        <option>Other</option>
                    </select>
                    <input type="text" class="form-control other-input" id="adoptionBarriersOther" name="adoptionBarriersOther" placeholder="Please specify">
                </div>
                <!-- Ideal Timeline for Setup Completion -->
                <div class="form-group">
                    <label for="setupTimeline">Ideal Timeline for Setup Completion *</label>
                    <select class="form-control" id="setupTimeline" name="setupTimeline" required>
                        <option value="">-- Select an option --</option>
                        <option>Within 1 month</option>
                        <option>1-3 months</option>
                        <option>3-6 months</option>
                        <option>Flexible</option>
                    </select>
                </div>
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
            window.scrollTo(0, 0);
        }

        // Handle "Other" inputs
        function handleOtherInputs() {
            $('select').each(function() {
                var selectElement = $(this);
                selectElement.change(function() {
                    var otherSelected = false;
                    selectElement.find('option:selected').each(function() {
                        if ($(this).text() === 'Other') {
                            otherSelected = true;
                        }
                    });
                    var otherInput = selectElement.closest('.form-group').find('.other-input');
                    if (otherSelected) {
                        otherInput.show();
                        otherInput.prop('required', true);
                    } else {
                        otherInput.hide();
                        otherInput.prop('required', false);
                    }
                });
            });
        }

        handleOtherInputs();

        $('#nextToStep2').click(function() {
            // Validate Step 1 inputs here if needed
            currentStep = 2;
            showStep(currentStep);
        });

        $('#backToStep1').click(function() {
            currentStep = 1;
            showStep(currentStep);
        });

        $('#nextToStep3').click(function() {
            // Validate Step 2 inputs here if needed
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
            // Collect form data and send to the server
            alert('Form submitted successfully!');
        });
    });
</script>
</body>
</html>