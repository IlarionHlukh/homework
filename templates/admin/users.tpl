{extends file="layout.tpl"}

{block name="body"}
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Registered At</th>
            <th>Role</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$site_name item=foo}
        <tr>
            <td>{$foo['id']}</td>
            <td>{$foo['email']}</td>
            <td>{$foo['created_at']}</td>
            <td>{if {$foo['is_admin']===1}}
                    admin
                {else}
                    user
                {/if}
            </td>
            <td>
                {if {$foo['is_admin']===1}}
                <form action="" method="POST">
                <button class="btn btn-success" formaction="/?action=makeUser">Make user</button>
                <button class="btn btn-danger" formaction="/?action=deleteUser">Delete</button>
                {else}
                    <button class="btn btn-primary" formaction="/?action=makeAdmin">Make admin</button>
                    <button class="btn btn-danger" formaction="/?action=deleteAdmin">Delete</button>
                {/if}
            </td>
            {/foreach}
        </tr>
        </tbody>
    </table>
{/block}