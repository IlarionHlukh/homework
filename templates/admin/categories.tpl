{extends file="layout.tpl"}

{block name="body"}

    <h3>Categories</h3>

    {if isset($smarty.get.error)}
        <div class="alert alert-danger" role="alert">{{$smarty.get.error}}</div>
    {/if}

    {if isset($smarty.get.message)}
        <div class="alert alert-success" role="alert">{{$smarty.get.message}}</div>
    {/if}

    <form action="/?action=adminCategories" method="POST" style="width: 400px">
        <div class="form-group">
            <label for="exampleInputEmail1">Category Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category name" name="category_name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Order</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Order" name="category_order">
        </div>
        <button type="submit" class="btn btn-success">Create Category</button>
    </form>


    <table class="table" cellspacing="0" border="1" id="table" class="sortable">
        <thead>
        <tr>
            <th class="nosort">ID</th>
            <th>Name</th>
            <th>Order</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$categories_order item=foo}
        <tr>
                <td>{$foo['id']}</td>
                <td>{$foo['name']}</td>
                <td>{$foo['order']}</td>
            {/foreach}
        </tr>
        </tbody>
    </table>


{/block}