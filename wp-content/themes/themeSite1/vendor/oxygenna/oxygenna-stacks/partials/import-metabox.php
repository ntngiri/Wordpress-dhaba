<table class="metabox-table">
    <tbody>
        <tr class="form-table" id="stack-export">
            <th scope="row" valign="top">
                <label for="export"><?php _e('Export Data', 'lambda-admin-td'); ?></label>
            </th>
            <td>
                <textarea name="export_data" id="export-data" cols="30" rows="10" style="width:100%;"><?php echo $export; ?></textarea>
            </td>
        </tr>
        <tr class="form-table" id="stack-import">
            <th scope="row" valign="top">
                <label for="export"><?php _e('Import Data', 'lambda-admin-td'); ?></label>
            </th>
            <td>
                <textarea name="import_data" id="import-data" cols="30" rows="10" style="width:100%;"></textarea>
                <input name="import_stack" type="submit" class="button button-primary button-large" id="import-stack" value="Import Data">
            </td>
        </tr>
    </tbody>
</table>