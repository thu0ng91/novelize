<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
</head>

<body>
	<table border="0" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td>
					<p>Howdy {{ $first_name }},</p>

    			<p class="welcome__intro">Novelize helps you keep track of your fictional world in notebooks, write your novels without distractions, and organize your thoughts inside the journal.</p>

		      <h3>First Create a Notebook</h3>

		      <p>Notebooks are the place to create your fictional world, including characters bios, story locations, important items, and research notes. One notebook can lead to several novels that take place in the same world.</p>

		      <p>You need to create a notebook before you start writing a novel. Then you can build your world or start writing.</p>

		      {{ link_to_route('create_notebook', 'CREATE A NOTEBOOK', null, ['style' => 'color: #E25822']) }}

		      <h3>Start Your First Novel</h3>

		      <p>After creating your notebook, you can start writing your first novel. With Novelize, your story is broken down into scenes and you decide how many scenes are in each chapter.</p>

		      <p>The main idea behind Novelize is to keep you on track with your writing goals. That's why you will find separate modes in which you can plot, write, review, and publish your work.</p>

		      {{ link_to_route('create_novel', 'CREATE A NOVEL', null, ['style' => 'color: #E25822']) }}

		      <h3>Keep a Journal</h3>

		      <p>Novelize includes a journal to allow you to record ideas that just don't fit into your notebook. Mabye you have an idea for a future novel that you don't want to forget. Maybe you need a place to keep important grammar rules. In the end, it's up to you.</p>

		      {{ link_to_route('create_entry', 'CREATE AN ENTRY', null, ['style' => 'color: #E25822']) }}
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>