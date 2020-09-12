{extends file="layout.tpl"}

{block name="body"}

    <h3>Products</h3>

    {if isset($smarty.get.error)}
        <div class="alert alert-danger" role="alert">{{$smarty.get.error}}</div>
    {/if}

    {if isset($smarty.get.message)}
        <div class="alert alert-success" role="alert">{{$smarty.get.message}}</div>
    {/if}

    <form action="/?action=adminAddProduct" method="POST" style="width: 400px" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Product name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Price $</label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Product price ($)" name="price">
        </div>
        <div class="form-group">
            <label for="file">Image</label>
            <input type="file" class="form-control" id="file" name="image">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category_id">
                {foreach from=$categories item=category}
                    <option value="{$category['id']}">{$category['name']}</option>
                {/foreach}
            </select>
        </div>

        <button type="submit" class="btn btn-success">Create Product</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Price $</th>
            <th>Manage</th>
        </tr>
        </thead>
        <tbody>
        {foreach from=$products item=product}
            <form action="/?action=adminUpdateProduct" method="POST">
                <tr>

                    <td>{$product['id']}</td>
                    <td><img src="{$product['image']}" width="60px" height="70px">
                    <td><input type="text" name="name" value="{$product['name']}"></td>
                    <td><input type="number" name="price" value="{$product['price']}"></td>
                    <input type="hidden" name="id" value="{$product['id']}">
                    <td><input type="submit" class="btn btn-primary" value="Update"></td>

                    <td><a href="/?action=adminRemoveProduct&productId={$product['id']}" class="btn btn-danger">Delete</a></td>
            </form>
            </tr>
        {/foreach}

        </tbody>
    </table>
{/block}