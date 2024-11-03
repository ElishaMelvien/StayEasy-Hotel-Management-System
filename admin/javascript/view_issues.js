function openAssignModal(issueId, issueType) {
    document.getElementById('issueId').value = issueId;
    document.getElementById('staffMember').value = ''; 
    fetchStaffMembers(issueType);

    const modalElement = document.getElementById('assignIssueModal');
    const modalInstance = new bootstrap.Modal(modalElement);
    modalInstance.show();
}

async function fetchStaffMembers(issueType) {
    try {
        const response = await fetch(`assign_issue.php?issue_type=${issueType}`);
        if (!response.ok) throw new Error('Network response was not ok');
        
        const data = await response.json();
        const staffMemberSelect = document.getElementById('staffMember');
        staffMemberSelect.innerHTML = '<option value="" disabled selected>Select Staff Member</option>';
        
        data.forEach(staff => {
            staffMemberSelect.innerHTML += `<option value="${staff.id}">${staff.name} - ${staff.role}</option>`;
        });
    } catch (error) {
        console.error('Error fetching staff:', error);
        new Swal('Error', 'Could not load staff members. Please try again later.', 'error');
    }
}

document.getElementById('assignForm').addEventListener('submit', async function(event) {
    event.preventDefault();
    const issueId = document.getElementById('issueId').value;
    const staffId = document.getElementById('staffMember').value;
    await assignIssue(issueId, staffId);
});

async function assignIssue(issueId, staffId) {
    try {
        const response = await fetch('assign_issue.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ issueId, staffId })
        });
        
        const data = await response.json();
        if (data.success) {
            await new Swal({
                title: 'Success',
                text: 'Issue assigned successfully!',
                icon: 'success'
            });
            window.location.reload();
        } else {
            new Swal({
                title: 'Error',
                text: data.message,
                icon: 'error'
            });
        }
    } catch (error) {
        console.error('Error assigning issue:', error);
        new Swal({
            title: 'Error',
            text: 'There was an error assigning the issue. Please try again.',
            icon: 'error'
        });
    }
}
